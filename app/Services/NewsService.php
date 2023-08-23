<?php

namespace App\Services;

use App\Constants\CommonConstants;
use App\Constants\NewsConstants;
use App\Repositories\News\NewsRepositoryInterface;
use App\Services\FileService\FileServiceInterface;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class NewsService extends BaseService
{
    const PATH_FILE = '/news_images';
    protected $mainRepository;
    protected FileServiceInterface $fileService;

    public function __construct(
        NewsRepositoryInterface $newsRepositoryInterface,
        FileServiceInterface $fileService
    ) {
        $this->mainRepository = $newsRepositoryInterface;
        $this->fileService = $fileService;
    }

    public function list($data, $paginate = false, $select = CommonConstants::SELECT_ALL)
    {
        $news = $this->mainRepository->list($data, $paginate, $select);
        return [
            'news' => $news,
            'itemStart' => $news->firstItem(),
            'itemEnd' => $news->lastItem(),
            'total' => $news->total(),
            'lastPage' => $news->lastPage(),
            'limit' => CommonConstants::DEFAULT_LIMIT_PAGE,
            'page' => $data[CommonConstants::INPUT_PAGE] ?? 1,
            'sort_column' => $data[CommonConstants::KEY_SORT_COLUMN] ?? '',
            'sort_type' => $data[CommonConstants::KEY_SORT_TYPE] ?? '',
            'sort_type_default' => CommonConstants::SORT_TYPE_DEFAULT
        ];
    }

    public function createNews($request)
    {
        $data = $request->input();
        if ($request->hasFile('thumbnail')) {
            $fileName = $this->saveThumbnail($request->file('thumbnail'));
        }
        $dataInsert = [
            'title' => $data['title'],
            'content' => $data['content'],
            'short_description' => $data['short_description'],
            'thumbnail' => $fileName ?? null,
            'category' => $data['category']
        ];

        return $this->create($dataInsert);
    }


    public function updateNews($request)
    {
        $data = $request->input();
        if (!empty($data['id'])) {
            $record = $this->findOneOrFail($data['id']);

            $dataUpdate = [
                'id' => $data['id'],
                'title' => $data['title'],
                'content' => $data['content'],
                'short_description' => $data['short_description'],
                'category' => $data['category'],
            ];

            if ($request->hasFile('thumbnail')) {
                $fileName = $this->saveThumbnail($request->file('thumbnail'));
                $dataUpdate['thumbnail'] = $fileName;

                // delete old thumbnail
                $this->deleteThumbnail($record->thumbnail_storage);
            }

            return $record->update($dataUpdate);
        } else {
            throw new BadRequestException();
        }
    }

    public function deleteNews($request)
    {
        $id = $request->input('id');
        $record = $this->findOneOrFail($id);

        // delete thumbnail
        $this->deleteThumbnail($record->thumbnail_storage);

        return $record->delete();
    }

    /**
     * save thumbnail of news and return file name
     * @param $file
     * @return string
     */
    public function saveThumbnail($file): string
    {
        $fileName = rand(1111, 9999) . time() . $file->getClientOriginalName();
        $thumbnailPath = NewsConstants::NEWS_THUMBNAILS . DIRECTORY_SEPARATOR . $fileName;

        Storage::disk('public')->put($thumbnailPath, file_get_contents($file));
        return $fileName;
    }

    /**
     * delete thumbnail of news
     * @param $file
     * @return string
     */
    public function deleteThumbnail($thumbnail)
    {
        if (Storage::disk('public')->exists($thumbnail)) {
            Storage::disk('public')->delete($thumbnail);
        }
    }

    /**
     * @param $param
     * @param $id
     * @return void
     */
    public function uploadContent($params, $id) {
        $news = $this->find($id);
        if (!empty($news)) {

            if (isset($params['code'])) {
                return $this->mainRepository->updates($news, [
                    'content' => $params['code']
                ]);
            } else {
                $oldPath = $this->fileService->fileFromTextEditor(
                    $news->content
                );
                return $this->fileService->upload($params['file'], self::PATH_FILE, $oldPath);
            }
        } else return $this->fileService->upload($params['file'], self::PATH_FILE);
    }
}
