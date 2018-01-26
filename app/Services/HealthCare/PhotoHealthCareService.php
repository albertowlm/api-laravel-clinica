<?php
namespace Clin\Services\HealthCare;
use Clin\Models\HealthCare;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Image;
class PhotoHealthCareService
{
    public function creating(HealthCare $healthCare)
    {

        if (is_a($healthCare->logo, UploadedFile::class) and $healthCare->logo->isValid()) {
            $this->upload($healthCare);
        }
    }
    public function deleting(HealthCare $healthCare)
    {
        Storage::delete($healthCare->logo);
    }
    public function updating(HealthCare $healthCare)
    {
        if (is_a($healthCare->logo, UploadedFile::class) and $healthCare->logo->isValid()) {
            $previous_image = $healthCare->getOriginal('logo');
            $this->upload($healthCare);
            Storage::delete($previous_image);
        }
    }
    protected function upload(HealthCare $healthCare)
    {
        $allowed_extensions = [
            'png',
            'gif',
            'jpeg',
            'jpg'
        ];
        $extension = $healthCare->logo->extension();
        if (!in_array($extension, $allowed_extensions)) {
            throw new Exception('Extension not allowed');
        }
        $name = bin2hex(openssl_random_pseudo_bytes(8));
        $name = $name . '.' . $extension;
        $name = 'logos/' . $name;
//        dd($name);
        // salva imagem com tamanho real
        $healthCare->logo->storeAs('', $name);
        // redimensiona a imagem
        $img = Image::make($healthCare->logo->getRealPath());
        $img->fit(150, 150)->save(public_path('/thumb/' . $name));
        $healthCare->logo = $name;
    }
}