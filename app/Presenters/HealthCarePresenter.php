<?php

namespace Clin\Presenters;

use Clin\Transformers\HealthCareTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class HealthCarePresenter
 *
 * @package namespace Clin\Presenters;
 */
class HealthCarePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new HealthCareTransformer();
    }
}
