<?php

namespace Clin\Presenters;

use Clin\Transformers\ClinicHealthCareTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ClinicHealthCarePresenter
 *
 * @package namespace Clin\Presenters;
 */
class ClinicHealthCarePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ClinicHealthCareTransformer();
    }
}
