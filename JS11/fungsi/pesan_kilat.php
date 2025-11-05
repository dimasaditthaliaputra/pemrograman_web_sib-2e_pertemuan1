<?php

function setflashdata($key = "", $value = "")
{
  if (!empty($key) && !empty($value)) {
    $_SESSION['_flashdata'][$key] = $value;
    return true;
  }
  return false;
}

function getflashdata($key = "")
{
  if (!empty($key) && isset($_SESSION['_flashdata'][$key])) {
    $data = $_SESSION['_flashdata'][$key];
    unset($_SESSION['_flashdata'][$key]);
    return $data;
  } else {
    echo "<script> alert('Flash Message \'{$key}\' is not defined. ') </script>";
  }
}

function pesan($key = "", $pesan = "")
{
  if ($key == "info") {
    setflashdata('info', "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
      <strong>Info!</strong> {$pesan}
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>");
  } elseif ($key == "success") {
    setflashdata('success', "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Berhasil!</strong> {$pesan}
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>");
  } elseif ($key == "danger") {
    setflashdata('danger', "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Gagal!</strong> {$pesan}
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>");
  } elseif ($key == "warning") {
    setflashdata('warning', "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong>Peringatan!</strong> {$pesan}
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>");
  }
}
