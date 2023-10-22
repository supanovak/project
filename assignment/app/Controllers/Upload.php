<?php
namespace App\Controllers;
class Upload extends BaseController
{
	public function index() {
        $data['errors'] = "";
        echo view('template/header');
        echo view('upload_form', $data);
        echo view('template/footer');
    }

    public function upload_file() {
        $data['errors'] = "";
        $file = $this->request->getFile('userfile');
        $file->move(WRITEPATH . 'uploads');
        $filename = $file->getName();
        $model = model('App\Models\Upload_model');
        $check = $model->upload($filename);
        if ($check) {
            echo view('template/header');
            echo view('upload_form', $data);
            echo "upload_success!";
            echo view('template/footer');
        } else {
            $data['errors'] = "<div class=\"alert alert-danger\" role=\"alert\"> Upload failed!! </div> ";
            echo view('template/header');
            echo view('upload_form', $data);
            echo view('template/footer');
        }
    }

    public function upload_multiple() {
        $data['errors'] = "";
        if(isset($_POST['submit'])) {
            $tempDir = "/assets/uploads/";
            $files = $_FILES['files']['name'];
            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
            $model = model('App\Models\Upload_model');
            $filenames = array_filter($files);
            if (!empty($filenames)) {
                foreach ($files as $key=>$val) {
                    $filename = basename($files[$key]);
                    $targetfilepath = $tempDir . $filename;
                    $check = $model->upload($filename);
                }
                if ($check) {
                    echo view('template/header');
                    echo view('upload_form', $data);
                    echo "upload_success!";
                    echo view('template/footer');
                } else {
                    $data['errors'] = "<div class=\"alert alert-danger\" role=\"alert\"> Upload failed!! </div> ";
                    echo view('template/header');
                    echo view('upload_form', $data);
                    echo view('template/footer');
                }
                
            }
        }
    }
}
