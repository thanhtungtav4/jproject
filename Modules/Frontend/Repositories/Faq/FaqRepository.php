<?php

namespace Modules\Frontend\Repositories\Faq;

use Modules\Frontend\Models\FaqTable;

class FaqRepository implements FaqRepositoryInterface
{
    protected $faq;

    public function __construct(
        FaqTable $faq
    ) {
        $this->faq = $faq;
    }

    /**
     * Lấy danh sách faq
     *
     * @param array $filter
     * @return array
     */
    public function getListAll(array $filter = [])
    {
        $dataSearch = [];
        if (isset($filter[getValueByLang('question_')])) {
            $value = $filter[getValueByLang('question_')];
            $dataSearch = [
                [getValueByLang('question_'), 'like', '%'.$value.'%']
            ];
        } else {
            $filter[getValueByLang('question_')] = null;
        }

        return [
            'data' => $this->faq->getListAll($dataSearch),
            'filter' => $filter
        ];
    }
}
