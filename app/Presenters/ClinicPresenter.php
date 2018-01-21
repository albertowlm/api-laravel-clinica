<?php

namespace Clin\Presenters;

use Clin\Transformers\ClinicTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ClinicPresenter
 *
 * @package namespace Clin\Presenters;
 */
class ClinicPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ClinicTransformer();
    }
}
