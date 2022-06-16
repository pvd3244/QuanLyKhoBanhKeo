-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 15, 2022 lúc 11:08 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlykhohang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `maCTSP` int(11) NOT NULL,
  `maSP` int(11) NOT NULL,
  `ngaySanXuat` date NOT NULL,
  `hanSD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietsanpham`
--

INSERT INTO `chitietsanpham` (`maCTSP`, `maSP`, `ngaySanXuat`, `hanSD`) VALUES
(1, 8, '2022-05-17', 12),
(2, 9, '2022-05-16', 24),
(14, 8, '2022-06-10', 18),
(21, 8, '2022-06-15', 12),
(22, 8, '2022-06-15', 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daily`
--

CREATE TABLE `daily` (
  `maDaiLy` int(11) NOT NULL,
  `tenDaiLy` varchar(50) NOT NULL,
  `sDT` varchar(15) NOT NULL,
  `diaChi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `daily`
--

INSERT INTO `daily` (`maDaiLy`, `tenDaiLy`, `sDT`, `diaChi`) VALUES
(1, 'Đại lý Cầu Diễn', '012345', 'Cầu Diễn - Hà Nội'),
(2, 'Đại lý Cầu Giấy', '014532', 'Cầu Giấy - Hà Nội'),
(3, 'Đại lý Quận 3', '034567', 'Quận 3 - HCM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `maKho` int(11) NOT NULL,
  `tenKho` varchar(30) NOT NULL,
  `diaChi` varchar(50) NOT NULL,
  `kichThuoc` double NOT NULL,
  `loaiKho` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `kho`
--

INSERT INTO `kho` (`maKho`, `tenKho`, `diaChi`, `kichThuoc`, `loaiKho`) VALUES
(14, 'A-101', 'Phu Tho', 90, 'Loại 3'),
(15, 'A-102', 'Phú Thọ', 80, 'Loại 3'),
(17, 'A-104', 'Ha Nam', 100, 'Loại 1'),
(18, 'A-103', 'Ha Noi', 60, 'Loại 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `maNV` int(11) NOT NULL,
  `tenNV` varchar(50) NOT NULL,
  `tuoi` int(11) NOT NULL,
  `sDT` varchar(15) NOT NULL,
  `diaChi` varchar(50) NOT NULL,
  `taiKhoan` varchar(30) NOT NULL,
  `matKhau` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`maNV`, `tenNV`, `tuoi`, `sDT`, `diaChi`, `taiKhoan`, `matKhau`) VALUES
(7, 'Phạm Văn Định', 21, '0123456', 'Phú Thọ', 'admin', '1'),
(8, 'Nguyễn Đức Kiên', 21, '012345', 'Hà Nam', 'quanly', '1'),
(18, 'Nguyễn Thị Hòa', 21, '452325', 'Hà Nội', 'nhanvien', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `maPhieu` int(11) NOT NULL,
  `ngayNhap` date NOT NULL,
  `maNV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`maPhieu`, `ngayNhap`, `maNV`) VALUES
(25, '2022-05-01', 7),
(26, '2022-05-12', 7),
(40, '2022-06-15', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhapsanpham`
--

CREATE TABLE `phieunhapsanpham` (
  `maPhieu` int(11) NOT NULL,
  `maSP` int(11) NOT NULL,
  `maCTSP` int(11) NOT NULL,
  `soLuongNhap` int(11) NOT NULL,
  `maKho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phieunhapsanpham`
--

INSERT INTO `phieunhapsanpham` (`maPhieu`, `maSP`, `maCTSP`, `soLuongNhap`, `maKho`) VALUES
(25, 8, 1, 850, 14),
(25, 9, 2, 100, 14),
(26, 8, 14, 400, 15),
(40, 8, 21, 10, 14),
(40, 8, 22, 100, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuat`
--

CREATE TABLE `phieuxuat` (
  `maPhieu` int(11) NOT NULL,
  `ngayXuat` date NOT NULL,
  `maNV` int(11) NOT NULL,
  `maDaiLy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phieuxuat`
--

INSERT INTO `phieuxuat` (`maPhieu`, `ngayXuat`, `maNV`, `maDaiLy`) VALUES
(5, '2022-05-09', 7, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuatsanpham`
--

CREATE TABLE `phieuxuatsanpham` (
  `maPhieu` int(11) NOT NULL,
  `maSP` int(11) NOT NULL,
  `maCTSP` int(11) NOT NULL,
  `soLuongXuat` int(11) NOT NULL,
  `donGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phieuxuatsanpham`
--

INSERT INTO `phieuxuatsanpham` (`maPhieu`, `maSP`, `maCTSP`, `soLuongXuat`, `donGia`) VALUES
(5, 8, 1, 800, 10000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `maSP` int(11) NOT NULL,
  `tenSP` varchar(50) NOT NULL,
  `donViTinh` varchar(10) NOT NULL,
  `kichThuoc` double NOT NULL,
  `loaiSP` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `tenSP`, `donViTinh`, `kichThuoc`, `loaiSP`) VALUES
(8, 'Bánh quy', 'Thùng', 0.075, 'Loại 3'),
(9, 'Kẹo dẻo', 'Thùng', 0.08, 'Loại 3'),
(15, 'Sản phẩm 1', 'Thùng', 0.1, 'Loại 1'),
(16, 'Sản phẩm 2', 'Thùng', 0.2, 'Loại 2');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`maCTSP`,`maSP`),
  ADD KEY `maSP` (`maSP`);

--
-- Chỉ mục cho bảng `daily`
--
ALTER TABLE `daily`
  ADD PRIMARY KEY (`maDaiLy`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`maKho`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`maNV`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`maPhieu`),
  ADD KEY `maNV` (`maNV`);

--
-- Chỉ mục cho bảng `phieunhapsanpham`
--
ALTER TABLE `phieunhapsanpham`
  ADD PRIMARY KEY (`maPhieu`,`maCTSP`),
  ADD KEY `maKho` (`maKho`),
  ADD KEY `maCTSP` (`maCTSP`),
  ADD KEY `maPhieu` (`maPhieu`);

--
-- Chỉ mục cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD PRIMARY KEY (`maPhieu`),
  ADD KEY `maNV` (`maNV`),
  ADD KEY `maDaiLy` (`maDaiLy`);

--
-- Chỉ mục cho bảng `phieuxuatsanpham`
--
ALTER TABLE `phieuxuatsanpham`
  ADD PRIMARY KEY (`maPhieu`,`maCTSP`),
  ADD KEY `maCTSP` (`maCTSP`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSP`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  MODIFY `maCTSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `daily`
--
ALTER TABLE `daily`
  MODIFY `maDaiLy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `kho`
--
ALTER TABLE `kho`
  MODIFY `maKho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `maNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `maPhieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  MODIFY `maPhieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD CONSTRAINT `chitietsanpham_ibfk_2` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`maNV`) REFERENCES `nhanvien` (`maNV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phieunhapsanpham`
--
ALTER TABLE `phieunhapsanpham`
  ADD CONSTRAINT `phieunhapsanpham_ibfk_1` FOREIGN KEY (`maKho`) REFERENCES `kho` (`maKho`) ON DELETE CASCADE,
  ADD CONSTRAINT `phieunhapsanpham_ibfk_2` FOREIGN KEY (`maPhieu`) REFERENCES `phieunhap` (`maPhieu`) ON DELETE CASCADE,
  ADD CONSTRAINT `phieunhapsanpham_ibfk_4` FOREIGN KEY (`maCTSP`) REFERENCES `chitietsanpham` (`maCTSP`) ON DELETE CASCADE,
  ADD CONSTRAINT `phieunhapsanpham_ibfk_5` FOREIGN KEY (`maPhieu`) REFERENCES `phieunhap` (`maPhieu`) ON DELETE CASCADE,
  ADD CONSTRAINT `phieunhapsanpham_ibfk_6` FOREIGN KEY (`maPhieu`) REFERENCES `phieunhap` (`maPhieu`);

--
-- Các ràng buộc cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD CONSTRAINT `phieuxuat_ibfk_1` FOREIGN KEY (`maNV`) REFERENCES `nhanvien` (`maNV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phieuxuat_ibfk_2` FOREIGN KEY (`maDaiLy`) REFERENCES `daily` (`maDaiLy`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phieuxuatsanpham`
--
ALTER TABLE `phieuxuatsanpham`
  ADD CONSTRAINT `phieuxuatsanpham_ibfk_1` FOREIGN KEY (`maPhieu`) REFERENCES `phieuxuat` (`maPhieu`) ON DELETE CASCADE,
  ADD CONSTRAINT `phieuxuatsanpham_ibfk_3` FOREIGN KEY (`maCTSP`) REFERENCES `chitietsanpham` (`maCTSP`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
