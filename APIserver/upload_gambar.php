<?php




$image = $_FILES['file']['tmp_name'];
$imagename = $_FILES['file']['name'];
 
$file_path = $_SERVER['DOCUMENT_ROOT'] . '/belajar_crud/APIserver';
 
$data = "";
 
if (!file_exists($file_path)) {
    mkdir($file_path, 0777, true);
}
 
if(!$image){
        $data['message'] = "Gambar tidak ditemukan";
}
else{
    if(move_uploaded_file($image, $file_path.'/'.$imagename)){
        $data['message'] = "Sukses Upload Gambar";
    }
 }
print_r(json_encode($data));
 
?>