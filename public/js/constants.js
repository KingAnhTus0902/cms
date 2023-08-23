const HTTP_UNPROCESSABLE_ENTITY = 422;
const HTTP_SUCCESS = 200;
const HTTP_FORBIDDEN = 403;
const HTTP_INTERNAL_SERVER_ERROR = 500;
const HTTP_BAD_REQUEST = 400;
const HTTP_NOT_IMPLEMENTED = 501;

// medical session status
const STATUS_WAITING = 1;

// User roles
const ADMIN = 1;
const EXAMINATION_DOCTOR = 2;
const REFERRING_DOCTOR = 3;
const RECEPTIONIST = 4;
const PHARMACIST = 5;

// Designated service medical session
const WATTING = 1;
const PROCESSING = 2;
const FINISH = 3;
const CANCEL = 4;
const SAVE = 5;
const DRAFT = 6;

let STATUS = {
    [WATTING]: 'Chờ',
    [PROCESSING]: 'Thực hiện',
    [FINISH]: 'Hoàn thành',
    [CANCEL]: 'Hủy',
    [SAVE]: 'Lưu',
    [DRAFT]: 'Lưu nháp'
};

// Permission and role
const TYPE_PERMISSION = 1;
const TYPE_ROLE = 2;

const STATUS_REAL_SAVE = 1;
const STATUS_DRAFT_SAVE = 0;

// Pagination
const DEFAULT_PAGE = 1;

// payment status
const PAID_STATUS = 1;

const DEFAULT_HOSPITAL_CODE = '01137';

// message upload image in editor
const UPLOAD_IMAGE_SUCCESS = 'Thêm ảnh thành công !';
const DELETE_IMAGE_SUCCESS = 'Xóa ảnh thành công !';
