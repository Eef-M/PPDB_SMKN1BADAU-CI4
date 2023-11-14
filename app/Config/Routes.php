<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/', 'User\UserController::index');
$routes->get('testing', 'User\UserController::coba');
$routes->get('user-ppdb', 'User\UserController::ppdb');
$routes->get('user-pengumuman', 'User\UserController::pengumuman');
$routes->get('user-pengumuman/detail/(:num)', 'User\UserController::detail_pengumuman/$1');
$routes->get('user-tambah-zonasi', 'User\UserController::zonasi');
$routes->get('user-tambah-afirmasi', 'User\UserController::afirmasi');
$routes->get('user-tambah-mutasi', 'User\UserController::mutasi');
$routes->get('user-tambah-prestasi', 'User\UserController::prestasi');
$routes->post('user-store-bio', 'User\UserController::store_bio');
$routes->post('user-store-nilai', 'User\UserController::store_nilai');
$routes->post('user-store-berkas', 'User\UserController::store_berkas');
$routes->get('user-tambah-prestasi', 'User\UserController::prestasi');
$routes->get('error-berkas', 'User\UserController::error_berkas');
$routes->get('view-pdf/(:num)', 'User\UserController::view_pdf/$1');
$routes->get('lihat-pdf/(:num)', 'User\UserController::lihat_pdf/$1');

$routes->get('edit-nilai/(:num)', 'User\UserController::edit_nilai/$1');
$routes->put('update-nilai/(:num)', 'User\UserController::update_nilai/$1');

// Update Berkas
$routes->put('update-foto/(:num)', 'User\BerkasHandlerC::updateFoto/$1');
$routes->put('update-kk/(:num)', 'User\BerkasHandlerC::updateKK/$1');
$routes->put('update-snisn/(:num)', 'User\BerkasHandlerC::updateSNisn/$1');
$routes->put('update-rpt/(:num)', 'User\BerkasHandlerC::updateRPT/$1');
$routes->put('update-kkm/(:num)', 'User\BerkasHandlerC::updateKelKurMampu/$1');
$routes->put('update-stortu/(:num)', 'User\BerkasHandlerC::updateSTOrtu/$1');
$routes->put('update-sertif/(:num)', 'User\BerkasHandlerC::updateSertif/$1');

$routes->get('user/view/(:num)/(:segment)', 'User\BerkasHandlerC::view_foto/$1/$2');
$routes->get('unduh-pdf/(:num)/(:segment)', 'User\BerkasHandlerC::unduhPDF/$1/$2');

// Informasi
$routes->get('informasi', 'User\InfoController::index');
$routes->get('user-tata-cara', 'User\InfoController::tataCara');
$routes->get('user-persyaratan', 'User\InfoController::persyaratan');
$routes->get('user-jadwal', 'User\InfoController::jadwal');

// Grup rute untuk menu dinamis
$routes->group('menu', function ($routes) {
    $routes->add('(:any)', 'User\UserController::dynamicMenu/$1');
});

$routes->get('error', 'User\UserController::error');

$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);

// Siswa ADMIN
$routes->get('siswa', 'Admin\SiswaController::index', ['filter' => 'role:admin']);
$routes->get('siswa-tambah-zonasi', 'Admin\SiswaController::zonasi_form', ['filter' => 'role:admin']);
$routes->get('siswa-tambah-afirmasi', 'Admin\SiswaController::afirmasi_form', ['filter' => 'role:admin']);
$routes->get('siswa-tambah-mutasi', 'Admin\SiswaController::mutasi_form', ['filter' => 'role:admin']);
$routes->get('siswa-tambah-prestasi', 'Admin\SiswaController::prestasi_form', ['filter' => 'role:admin']);
$routes->post('siswa-store', 'Admin\SiswaController::store', ['filter' => 'role:admin']);
$routes->delete('siswa/delete/(:num)/(:any)', 'Admin\SiswaController::delete/$1/$2', ['filter' => 'role:admin']);
$routes->get('siswa/detail/(:num)', 'Admin\SiswaController::detail/$1', ['filter' => 'role:admin']);
$routes->put('siswa/lulus/(:num)', 'Admin\SiswaController::lulus/$1', ['filter' => 'role:admin']);
$routes->put('siswa/verif/(:num)', 'Admin\SiswaController::verif/$1', ['filter' => 'role:admin']);
$routes->put('siswa/unverif/(:num)', 'Admin\SiswaController::unverif/$1', ['filter' => 'role:admin']);
$routes->put('siswa/tidak-lulus/(:num)', 'Admin\SiswaController::tidakLulus/$1', ['filter' => 'role:admin']);
$routes->put('siswa/proses-lulus/(:num)', 'Admin\SiswaController::prosesLulus/$1', ['filter' => 'role:admin']);
// $routes->get('siswa-cari', 'Admin\SiswaController::cari_page', ['filter' => 'role:admin']);
$routes->post('cari', 'Admin\SiswaController::cari_siswa', ['filter' => 'role:admin']);
$routes->get('siswa-bobot', 'Admin\SiswaController::bobot_siswa', ['filter' => 'role:admin']);
$routes->get('siswa-bobot-zonasi', 'Admin\SiswaController::bobot_zonasi', ['filter' => 'role:admin']);
$routes->get('siswa-bobot-afirmasi', 'Admin\SiswaController::bobot_afirmasi', ['filter' => 'role:admin']);
$routes->get('siswa-bobot-mutasi', 'Admin\SiswaController::bobot_mutasi', ['filter' => 'role:admin']);
$routes->get('siswa-bobot-prestasi', 'Admin\SiswaController::bobot_prestasi', ['filter' => 'role:admin']);
$routes->get('siswa-bobot/detail/(:num)', 'Admin\SiswaController::detail_bobot/$1', ['filter' => 'role:admin']);
$routes->post('nilai-sertif/store/(:num)', 'Admin\SiswaController::store_nilai_sertif/$1', ['filter' => 'role:admin']);
$routes->delete('nilai-sertif/hapus/(:num)', 'Admin\SiswaController::hapus_nilai_sertif/$1', ['filter' => 'role:admin']);

$routes->get('siswa-berkas/download/(:num)/(:segment)', 'Admin\SiswaController::download_berkas/$1/$2', ['filter' => 'role:admin']);
$routes->get('siswa-berkas/view/(:num)/(:segment)', 'Admin\SiswaController::view_berkas/$1/$2', ['filter' => 'role:admin']);

$routes->get('siswa-berkas/view_pdf/(:num)/(:segment)', 'Admin\SiswaController::generatePdf/$1/$2', ['filter' => 'role:admin']);

$routes->get('siswa-excel', 'Admin\SiswaController::exportExcel', ['filter' => 'role:admin']);
$routes->get('zonasi-excel', 'Admin\SiswaController::export_zonasi', ['filter' => 'role:admin']);
$routes->get('afirmasi-excel', 'Admin\SiswaController::export_afirmasi', ['filter' => 'role:admin']);
$routes->get('mutasi-excel', 'Admin\SiswaController::export_mutasi', ['filter' => 'role:admin']);
$routes->get('prestasi-excel', 'Admin\SiswaController::export_prestasi', ['filter' => 'role:admin']);

// Penjadwalan
$routes->get('penjadwalan', 'Admin\JadwalController::index', ['filter' => 'role:admin']);
$routes->get('penjadwalan-tambah', 'Admin\JadwalController::tambah_form', ['filter' => 'role:admin']);
$routes->post('penjadwalan-store', 'Admin\JadwalController::store', ['filter' => 'role:admin']);
$routes->get('penjadwalan-hapus', 'Admin\JadwalController::delete', ['filter' => 'role:admin']);
$routes->get('penjadwalan/edit/(:num)', 'Admin\JadwalController::edit/$1', ['filter' => 'role:admin']);
$routes->put('penjadwalan/update/(:num)', 'Admin\JadwalController::update/$1', ['filter' => 'role:admin']);

// Pengumuman
// $routes->get('admin-pengumuman', 'Admin\PengumumanController::index', ['filter' => 'role:admin']);
// $routes->get('pengumuman-tambah', 'Admin\PengumumanController::tambah_form', ['filter' => 'role:admin']);
// $routes->post('pengumuman-store', 'Admin\PengumumanController::store', ['filter' => 'role:admin']);
// $routes->get('pengumuman/edit/(:num)', 'Admin\PengumumanController::edit/$1', ['filter' => 'role:admin']);
// $routes->put('pengumuman/update/(:num)', 'Admin\PengumumanController::update/$1', ['filter' => 'role:admin']);
// $routes->delete('pengumuman/delete/(:num)', 'Admin\PengumumanController::delete/$1', ['filter' => 'role:admin']);

// Navigation
$routes->get('navigation', 'Admin\NavigationController::index', ['filter' => 'role:admin']);
$routes->post('navigation-store', 'Admin\NavigationController::store', ['filter' => 'role:admin']);
$routes->delete('navigation/delete/(:num)', 'Admin\NavigationController::delete/$1', ['filter' => 'role:admin']);

// Content
// $routes->get('content', 'Admin\ContentController::index', ['filter' => 'role:admin']);
// $routes->get('content-tambah', 'Admin\ContentController::tambah_form', ['filter' => 'role:admin']);
// $routes->post('content-store', 'Admin\ContentController::store', ['filter' => 'role:admin']);
// $routes->get('content/edit/(:num)', 'Admin\ContentController::edit/$1', ['filter' => 'role:admin']);
// $routes->put('content/update/(:num)', 'Admin\ContentController::update/$1', ['filter' => 'role:admin']);
// $routes->delete('content/delete/(:num)', 'Admin\ContentController::delete/$1', ['filter' => 'role:admin']);

// Slideshow
$routes->get('slideshow', 'Admin\SlideController::index', ['filter' => 'role:admin']);
$routes->get('slideshow-tambah', 'Admin\SlideController::tambah_form', ['filter' => 'role:admin']);
$routes->post('slideshow-store', 'Admin\SlideController::store', ['filter' => 'role:admin']);
$routes->delete('slideshow/delete/(:num)', 'Admin\SlideController::delete/$1', ['filter' => 'role:admin']);

//Footer
$routes->get('footer', 'Admin\FooterController::index', ['filter' => 'role:admin']);
$routes->post('footer-store', 'Admin\FooterController::store', ['filter' => 'role:admin']);
$routes->get('footer-tambah', 'Admin\FooterController::tambah_form', ['filter' => 'role:admin']);
$routes->delete('footer/delete/(:num)', 'Admin\FooterController::delete/$1', ['filter' => 'role:admin']);
$routes->get('footer/edit/(:num)', 'Admin\FooterController::edit/$1', ['filter' => 'role:admin']);
$routes->put('footer/update/(:num)', 'Admin\FooterController::update/$1', ['filter' => 'role:admin']);

// User Account
$routes->get('user-account', 'Admin\UserAccount::index', ['filter' => 'role:admin']);
$routes->get('user-account/tambah', 'Admin\UserAccount::tambah_form', ['filter' => 'role:admin']);
$routes->get('user-account/detail/(:num)', 'Admin\UserAccount::detail/$1', ['filter' => 'role:admin']);
$routes->delete('user-account/delete/(:num)', 'Admin\UserAccount::delete/$1', ['filter' => 'role:admin']);

// Tahun Ajaran
$routes->get('tahun_ajaran', 'Admin\TahunAjaranController::index', ['filter' => 'role:admin']);
$routes->get('tahun_ajaran-tambah', 'Admin\TahunAjaranController::tambah_form', ['filter' => 'role:admin']);
$routes->post('tahun_ajaran-store', 'Admin\TahunAjaranController::store', ['filter' => 'role:admin']);
$routes->get('tahun_ajaran/edit/(:num)', 'Admin\TahunAjaranController::edit/$1', ['filter' => 'role:admin']);
$routes->put('tahun_ajaran/update/(:num)', 'Admin\TahunAjaranController::update/$1', ['filter' => 'role:admin']);
$routes->delete('tahun_ajaran/delete/(:num)', 'Admin\TahunAjaranController::delete/$1', ['filter' => 'role:admin']);
$routes->put('tahun_ajaran/aktif/(:num)', 'Admin\TahunAjaranController::aktif/$1', ['filter' => 'role:admin']);
$routes->put('tahun_ajaran/non-aktif/(:num)', 'Admin\TahunAjaranController::non_aktif/$1', ['filter' => 'role:admin']);

// Jurusan
$routes->get('jurusan', 'Admin\JurusanController::index', ['filter' => 'role:admin']);
$routes->get('jurusan-tambah', 'Admin\JurusanController::tambah_form', ['filter' => 'role:admin']);
$routes->post('jurusan-store', 'Admin\JurusanController::store', ['filter' => 'role:admin']);
$routes->get('jurusan/edit/(:num)', 'Admin\JurusanController::edit/$1', ['filter' => 'role:admin']);
$routes->put('jurusan/update/(:num)', 'Admin\JurusanController::update/$1', ['filter' => 'role:admin']);
$routes->delete('jurusan/delete/(:num)', 'Admin\JurusanController::delete/$1', ['filter' => 'role:admin']);
