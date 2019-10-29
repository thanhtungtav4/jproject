<?php


namespace Modules\Admin\Repositories\BlogCategory;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Models\BlogCategoryTable;

class BlogCategoryRepository implements BlogCategoryRepositoryInterface
{
    protected $timestamps = true;
    protected $blog_category;

    public function __construct(
        BlogCategoryTable $blog_category
    ) {
        $this->blog_category = $blog_category;
    }

    /**
     * @param array $filters
     * @return mixed
     */
    public function list(array $filters = [])
    {
        return $this->blog_category->getList($filters);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $data['title_vi'] = strip_tags($data['title_vi']);
        $data['title_en'] = strip_tags($data['title_en']);
//            $data['alias_vi'] = str_slug($data['title_vi']);
//            $data['alias_en'] = str_slug($data['title_en']);
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();

        if (isset($data['image_thumb'])) {
            $data['image_thumb'] = $this->transferTempfileToAdminfile(
                $data['image_thumb'],
                str_replace('', '', $data['image_thumb'])
            );
        } else {
            unset($data['image_thumb']);
        }
        $id_category = $this->blog_category->add($data);
        $result = [
            'error' => false,
            'message' => __('admin::validation.blog_category.success'),
            'id' => $id_category
        ];
        return $result;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->blog_category->getItem($id);
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id)
    {
        $data['title_vi'] = strip_tags($data['title_vi']);
        $data['title_en'] = strip_tags($data['title_en']);
//            $data['alias_vi'] = str_slug($data['title_vi']);
//            $data['alias_en'] = str_slug($data['title_en']);
        $data['updated_by'] = Auth::id();
        if (isset($data['image_thumb'])) {
            $data['image_thumb'] = $this->transferTempfileToAdminfile(
                $data['image_thumb'],
                str_replace('', '', $data['image_thumb'])
            );
        } else {
            unset($data['image_thumb']);
        }
        $this->blog_category->edit($data, $id);

        $result = [
            'error' => false,
            'message' => __('admin::validation.blog_category.update_success'),
        ];
        return $result;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        return $this->blog_category->remove($id);
    }

    /**
     * Move image từ folder temp sang folder blog category
     *
     * @param $filename
     * @return string
     */
    private function transferTempfileToAdminfile($filename)
    {
        $old_path = TEMP_PATH . '/' . $filename;
        $new_path = BLOG_CATEGORY_PATH . date('Ymd') . '/' . $filename;
        Storage::disk('public')->makeDirectory(BLOG_CATEGORY_PATH . date('Ymd'));
        Storage::disk('public')->move($old_path, $new_path);
        return $new_path;
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function changeStatus(array $data, $id)
    {
        return $this->blog_category->edit($data, $id);
    }

    /**
     * @return mixed
     */
    public function getOptionBlogCategory()
    {
        return $this->blog_category->getBlogCategoryOption();
    }
}