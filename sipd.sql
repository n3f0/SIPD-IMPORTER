
CREATE TABLE `kegiatan_tmp` (
  `id_urusan` int(11) NOT NULL,
  `kode_urusan` varchar(5) NOT NULL,
  `nama_urusan` varchar(100) NOT NULL,
  `id_bidang_urusan` int(11) NOT NULL,
  `kode_bidang_urusan` varchar(8) NOT NULL,
  `nama_bidang_urusan` varchar(100) NOT NULL,
  `id_program` int(11) NOT NULL,
  `kode_program` varchar(10) NOT NULL,
  `nama_program` varchar(100) NOT NULL,
  `id_giat` int(11) NOT NULL,
  `kode_giat` varchar(15) NOT NULL,
  `nama_giat` varchar(100) NOT NULL,
  `id_sub_giat` int(11) NOT NULL,
  `kode_sub_giat` varchar(17) NOT NULL,
  `nama_sub_giat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `kegiatan_tmp`
  ADD PRIMARY KEY (`id_urusan`,`id_bidang_urusan`,`id_program`,`id_giat`,`id_sub_giat`);