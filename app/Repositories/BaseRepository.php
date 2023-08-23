<?php

namespace App\Repositories;

use App\Helpers\CommonHelper;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Constants\CommonConstants;

abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct()
    {
        $this->setModel();
    }

    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    abstract public function getModel();

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param [type] $id
     * @param array $attributes
     * @param array $options
     * @return void
     */
    public function update($id, array $attributes, array $options = [])
    {
        $result = $this->find($id);
        if (!$result) {
            return false;
        }
        $result->update($attributes, $options);
        return $result;
    }

    /**
     * @param array $columns
     * @param $orderBy
     * @param $sortBy
     * @return mixed
     */
    public function all($columns = ['*'], $orderBy = 'id', $sortBy = 'asc')
    {
        return $this->model->orderBy($orderBy, $sortBy)->get($columns);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param  $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findOneOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param array $data
     * @return Collection
     */
    public function findBy(array $data, $columns)
    {
        return $this->model->where($data)->get($columns);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function findOneBy(array $data)
    {
        return $this->model->where($data)->first();
    }

    /**
     * @param array $data
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findOneByOrFail(array $data)
    {
        return $this->model->where($data)->firstOrFail();
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function deleteAll(): bool
    {
        return $this->model->delete();
    }

    public function findByAttrFirst($attr, $value)
    {
        return !is_null($attr) ? $this->model::where($attr, $value)->first() : null;
    }

    public function pluckAttrId($attr)
    {
        return !is_null($attr) ? $this->model::pluck($attr, 'id')->all() : collect([]);
    }

    public function deleteByAttr($attr, $value)
    {
        return !is_null($attr) ? $this->model::where($attr, $value)->delete() : false;
    }

    public function findByAttrInArray($attr, $array)
    {
        return !is_null($attr) ? $this->model::whereIn($attr, $array)->get() : collect([]);
    }

    public function updateOrCreateModel($data)
    {
        return !is_null($data) ? $this->model::updateOrCreate($data) : false;
    }

    public function arrayAttrId($attr)
    {
        return !is_null($attr) ? $this->model::pluck($attr, 'id')->toArray() : [];
    }

    public function getAllWithRelationship(
        $relations = [''],
        $columns = ['*'],
        $orderBy = 'id',
        $sortBy = 'asc'
    ) {
        return $this->model->with($relations)->orderBy($orderBy, $sortBy)->get($columns);
    }

    public function orderBy($orderBy, $sortBy, $data)
    {
        return $this->model->where($data)->orderBy($orderBy, $sortBy)->get();
    }

    public function findByWithRelationship(
        array $relations,
        array $data,
        $columns,
        $orderBy,
        $sortBy
    ) {
        return $this->model->with($relations)->where($data)->orderBy($orderBy, $sortBy)->get($columns);
    }

    public function whereIn($column, array $data, $relations)
    {
        return $this->model->with($relations)->whereIn($column, $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Start restructure base repository
    |--------------------------------------------------------------------------
    */

    /**
     * Get the name of model.
     *
     */
    public function getTable(): string
    {
        return $this->model->getTable();
    }

    /**
     * Check the existent model.
     *
     * @param $condition
     * @param $column
     * @return bool
     */
    public function exist($column, $condition): bool
    {
        return $this->model->where($column, $condition)->exists();
    }

    /**
     * Get the list with relationship
     *
     * @param array $columns
     * @param array $condition
     * @param array $other sort, relation, join, paginate, filter
     * @return mixed
     */
    public function getList(array $columns = SELECT_ALL, array $condition = [], array $other = []): mixed
    {
        $query = $this->getClause($this->model->newQuery(), $condition);
        $query->select($columns);
        $other = $this->moveItemToLast($other, KEY_PAGINATE);
        foreach ($other as $key => $value) {
            $query = $this->{$key}($query, $value);
        }

        return $query;
    }

    /**
     * Get the model detail.
     *
     * @param array $condition
     * @param array $columns
     * @param array $relations
     *
     * @return ?Model
     */
    public function getDetail(array $condition, array $columns = SELECT_ALL, array $relations = []): ?Model
    {
        $query = $this->getClause($this->model->newQuery(), $condition);
        if ($relations) {
            $query = $this->relate($query, $relations);
        }

        return $query->first($columns);
    }

    /**
     * Get clause And.
     *
     * @param Builder $query
     * @param array $condition
     *
     * @return Builder
     */
    public function getClause(Builder $query, array $condition): Builder
    {
        foreach ($condition as $column => $value) {
            if (isset($value[KEY_VALUE])) {
                switch ($value[KEY_OPERATOR]) {
                    case KEY_OR_WHERE_IN:
                        $query->orWhereIn($column, $value[KEY_VALUE]);
                        break;
                    case KEY_OR_WHERE_NOT_IN:
                        $query->orWhereNotIn($column, $value[KEY_VALUE]);
                        break;
                    case KEY_OR_WHERE_BETWEEN:
                        $query->orWhereBetween($column, $value[KEY_VALUE]);
                        break;
                    case KEY_OR_WHERE_NOT_BETWEEN:
                        $query->orWhereNotBetween($column, $value[KEY_VALUE]);
                        break;
                    case KEY_OR_WHERE_NULL:
                        $query->orWhereNull($column);
                        break;
                    case KEY_OR_WHERE_NOT_NULL:
                        $query->orWhereNotNull($column);
                        break;
                    case KEY_OR_WHERE:
                        $query->orWhere($column, $value[KEY_VALUE][KEY_OPERATOR], $value[KEY_VALUE][KEY_VALUE]);
                        break;
                    case KEY_WHERE_IN:
                        $query->whereIn($column, $value[KEY_VALUE]);
                        break;
                    case KEY_WHERE_NOT_IN:
                        $query->whereNotIn($column, $value[KEY_VALUE]);
                        break;
                    case KEY_WHERE_BETWEEN:
                        $query->whereBetween($column, $value[KEY_VALUE]);
                        break;
                    case KEY_WHERE_NOT_BETWEEN:
                        $query->whereNotBetween($column, $value[KEY_VALUE]);
                        break;
                    case KEY_WHERE_NULL:
                        $query->whereNull($column);
                        break;
                    case KEY_WHERE_NOT_NULL:
                        $query->whereNotNull($column);
                        break;
                    case KEY_WHERE_DATE:
                        $query->whereDate($column, $value[KEY_VALUE][KEY_OPERATOR], $value[KEY_VALUE][KEY_VALUE]);
                        break;
                    case KEY_WHERE_HAS:
                        $query->whereHas($value[KEY_RELATIONSHIP_NAME], function ($q) use ($value, $column) {
                            $q->where($column, $value[KEY_VALUE]);
                        });
                        break;
                    case KEY_WHERE_HAS_LIKE:
                        $query->whereHas($value[KEY_RELATIONSHIP_NAME], function ($q) use ($value, $column) {
                            $q->where($column, OPERATOR_LIKE, '%' . $value[KEY_VALUE] . '%');
                        });
                        break;
                    case KEY_WHERE_IN_VALUE_AND_NULL:
                        $query->where(function ($q) use ($value, $column) {
                            $q->whereIn($column, $value[KEY_VALUE])
                                ->orWhereNull($column);
                        });
                        break;
                    case KEY_WHERE_IN_VALUE_AND_NOT_NULL:
                        $query->orWhere(function ($q) use ($value, $column) {
                            $q->orWhere($column, $value[KEY_VALUE])
                                ->whereNotNull($column);
                        });
                        break;
                    case KEY_LIKE_OR_WHERE:
                        $query->orWhere($column, OPERATOR_LIKE, '%' . $value[KEY_VALUE] . '%');
                        break;
                    case KEY_LIKE_WHERE:
                        $query->where($column, OPERATOR_LIKE, '%' . $value[KEY_VALUE] . '%');
                        break;
                    case KEY_WHERE_HAS_BETWEEN:
                        $query->whereHas($value[KEY_RELATIONSHIP_NAME], function ($q) use ($value, $column) {
                            $q->whereBetween($column, CommonHelper::dateBetween($value[KEY_VALUE]));
                        });
                        break;
                    default:
                        $query->where($column, $value[KEY_OPERATOR], $value[KEY_VALUE]);
                        break;
                }
            }
        }


        return $query;
    }

    /**
     * Move item to the last index of array.
     *
     * @param array $input
     * @param $key
     * @return array
     */
    public static function moveItemToLast(array $input, $key): array
    {
        if (count($input) > 1 && array_key_exists($key, $input)) {
            $valueOfKeyInArray = $input[$key];
            unset($input[$key]);
            $input += [
                $key => $valueOfKeyInArray
            ];
        }

        return $input;
    }

    /**
     * Sort the list of models.
     *
     * @param Builder $query
     * @param array $sort
     * @return Builder
     */
    protected function sort(Builder $query, array $sort): Builder
    {
        foreach ($sort as $column => $value) {
            $query->orderBy($column, $value);
        }

        return $query;
    }

    /**
     * Relate relationship.
     *
     * @param Builder $query
     * @param array $relations
     *
     * @return Builder
     */
    protected function relate(Builder $query, array $relations): Builder
    {
        foreach ($relations as $relation) {
            $query->with([$relation[KEY_RELATIONSHIP_NAME] => function ($query) use ($relation) {
                $query->select($relation[KEY_RELATIONSHIP_SELECT]);
            }]);
        }

        return $query;
    }

    /**
     * Join other table.
     *
     * @param Builder $query
     * @param array $join
     * @param null $type
     * @return Builder
     */
    protected function join(Builder $query, array $join, $type = null)
    {
        foreach ($join as $value) {
            $query->join(
                $value[KEY_TABLE],
                $value[KEY_FOREIGN_KEY],
                OPERATOR_EQUAL,
                $value[KEY_PRIMARY_KEY],
                $type ?? $value[KEY_TYPE_JOIN]
            );
        }

        return $query;
    }

    /**
     * Filter models.
     *
     * @param Builder $query
     * @param array $filter
     * @return Builder
     */
    protected function filter(Builder $query, array $filter): Builder
    {
        return $query->filter($filter);
    }

    /**
     * Paginate records.
     *
     * @param Builder $query
     * @param array $pagination
     * @return LengthAwarePaginator
     */
    protected function paginates(Builder $query, array $pagination): LengthAwarePaginator
    {
        return $query->paginate($pagination[INPUT_PAGE_SIZE], SELECT_ALL, INPUT_PAGE, $pagination[INPUT_PAGE]);
    }

    /**
     * Delete record by id | list id
     *
     * @param array|int $id
     * @return int|null
     */
    public function delete(array|int $id): ?int
    {
        try {
            $query = $this->model->destroy($id);
            // Count equal to 0
            if (empty($query)) {
                $query = null;
            }
        } catch (\Exception $exception) {
            //Todo Log::error('[Delete]: ' . $exception->getMessage());
            $query = null;
        }

        return $query;
    }

    /**
     * Update model.
     *
     * @param Model $model
     * @param array $input
     *
     * @return Model|null
     */
    public function updates(Model $model, array $input): ?Model
    {
        try {
            foreach ($input as $attribute => $value) {
                $model->{$attribute} = $value;
            }
            if ($model->isDirty()) {
                $model->save();
            }
        } catch (\Exception $exception) {
            //Todo Log::error('[Update]: ' . $exception->getMessage());
            $model = null;
        }

        return $model;
    }

    /**
     * Get first records.
     *
     * @param array|string[] $columns
     *
     * @return ?Model
     */
    public function first(array $columns = SELECT_ALL): ?Model
    {
        return $this->model->select($columns)->first();
    }

    /**
     * Create multiple model.
     *
     * @param array $input
     * @return mixed
     */
    public function insert(array $input): mixed
    {
        try {
            return $this->model->insert($input);
        } catch (\Exception $exception) {
            //Log::error('[Create]: ' . $exception->getMessage());
            return null;
        }
    }

    /**
     * Restore the trashed records
     *
     * @param $id
     * @return mixed
     */
    public function restore($id): mixed
    {
        try {
            $query = $this->model->withTrashed()->find($id);

            if ($query->trashed()) {
                $query = $query->restore();
            }
        } catch (\Exception $exception) {
            //Log::error('[Restore]: ' . $exception->getMessage());
            $query = null;
        }

        return $query;
    }

    /*
    |--------------------------------------------------------------------------
    | End restructure base repository
    |--------------------------------------------------------------------------
    */

    /**
     *
     * @return LengthAwarePaginator
     */
    protected function paginate(Builder $query, array $pagination)
    {
        return $query->paginate(
            $pagination[CommonConstants::INPUT_PAGE_SIZE],
            CommonConstants::SELECT_ALL,
            CommonConstants::INPUT_PAGE,
            $pagination[CommonConstants::INPUT_PAGE]
        );
    }

    /**
     * Handle data paginate
     *
     * @param array $data
     *
     * @return array
     */
    public function handlePaginate($data)
    {
        $page[CommonConstants::INPUT_PAGE_SIZE] = CommonConstants::DEFAULT_LIMIT_PAGE;
        $page[CommonConstants::INPUT_PAGE] = CommonConstants::PAGE_DEFAULT;
        if (!empty($data[CommonConstants::KEY_LIMIT])) {
            $page[CommonConstants::INPUT_PAGE_SIZE] = $data[CommonConstants::KEY_LIMIT];
        }
        if (isset($data[CommonConstants::INPUT_PAGE])) {
            $pageNumber = (int)$data[CommonConstants::INPUT_PAGE];
            $page[CommonConstants::INPUT_PAGE] = $pageNumber;
        }
        return $page;
    }

    /**
     * Select column
     *
     * @param array $select
     *
     * @return Builder
     */
    public function select(array $select): Builder
    {
        return $this->model->select($select);
    }

    public function saveMultipleData(array $data)
    {
        return $this->model->insert($data);
    }
}
