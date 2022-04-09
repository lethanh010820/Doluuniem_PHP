-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 09, 2022 lúc 08:21 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopluuniem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `userId` bigint(11) NOT NULL,
  `createdDate` date NOT NULL,
  `receivedDate` date DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `userId`, `createdDate`, `receivedDate`, `status`) VALUES
(26, 17, '2022-04-09', '2022-04-09', 'Complete'),
(27, 17, '2022-04-09', '2022-04-09', 'Complete');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `billdetails`
--

CREATE TABLE `billdetails` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` bigint(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `productPrice` decimal(10,0) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `billdetails`
--

INSERT INTO `billdetails` (`id`, `orderId`, `productId`, `quantity`, `productPrice`, `productName`, `productImage`) VALUES
(17, 26, 22, 1, '500000', 'Đèn mặt trăng', 'denmattrang.jpg'),
(18, 27, 22, 2, '500000', 'Đèn mặt trăng', 'denmattrang.jpg'),
(19, 27, 21, 1, '4500000', 'Đèn lồng kính', 'denlongkinh.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `Id` int(11) NOT NULL,
  `userId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maSP` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `tenSP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `giaBan` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsach`
--

CREATE TABLE `danhsach` (
  `maDS` int(11) NOT NULL,
  `tenDS` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `url` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `maLoai` int(11) NOT NULL,
  `tenLoai` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`maLoai`, `tenLoai`) VALUES
(1, 'Cốc sứ'),
(2, 'Đèn ngủ'),
(3, 'Bật lửa'),
(4, 'keo'),
(5, 'Đồ chơi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(0, 'khách hàng'),
(1, 'nhân viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `maSP` bigint(11) NOT NULL,
  `tenSP` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `giaBan` double NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `dvt` varchar(500) DEFAULT NULL,
  `maLoai` int(11) NOT NULL,
  `soldcount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `tenSP`, `image`, `giaBan`, `quantity`, `dvt`, `maLoai`, `soldcount`) VALUES
(5, 'Bật lửa quý ông', 'batlua1.jpg', 1500000, 100, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 3, 0),
(6, 'Bật lửa 1', 'batlua2.jpg', 200000, 901, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 1, 0),
(7, 'Bật lửa hình lựu đạn', 'batlua3.jpg', 4500000, 101, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 1, 0),
(8, 'Bật lửa nghệ thuật new', '36baf5f506.jpg', 150000, 100, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.', 1, 0),
(9, 'Bật lửa Ý', 'batlua5.jpg', 4500000, 100, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 3, 0),
(10, 'Bật lửa sáng tạo 2', 'batlua6.jpg', 20000, 90, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 1, 0),
(11, 'Cầu tuyết', 'cautuyet.jpg', 50000, 100, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 5, 0),
(12, 'Hộp tiết kiệm', 'hoptietkiem.jpg', 250000, 80, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 1, 0),
(13, 'Hộp nhạc', 'hopnhac.jpg', 450000, 100, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 5, 0),
(14, 'Đồng hồ cát', 'donghocat.jpg', 150000, 80, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 5, 0),
(15, 'Sodoku', 'sodoku.jpg', 2000000, 100, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 5, 0),
(16, 'Xếp gỗ', 'xepgo.jpg', 30000, 100, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 5, 0),
(17, 'Đèn 3D', 'den3d.jpg', 500000, 100, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 2, 0),
(18, 'Đèn hình con gà', 'denconga.jpg', 500000, 90, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 2, 0),
(19, 'Đèn hình con heo', 'denconheo.jpg', 4500000, 100, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 2, 0),
(20, 'Đèn led trái tim', 'denled.jpg', 500000, 80, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 2, 0),
(21, 'Đèn lồng kính', 'denlongkinh.jpg', 4500000, 99, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 2, 1),
(22, 'Đèn mặt trăng', 'denmattrang.jpg', 500000, 87, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 2, 3),
(23, 'Khung ảnh xinh', 'khunganhdep.jpg', 50000, 100, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 4, 0),
(24, 'Khung ảnh giáng sinh', 'khunganhgiangsinh.jpg', 50000, 100, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 4, 0),
(25, 'Khung ảnh vẻ chân dung', 'khunganhlucky.jpg', 50000, 90, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 4, 0),
(26, 'Khung ảnh cổ điển', 'khungcodien.jpg', 50000, 100, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 4, 0),
(27, 'Khung ảnh gỗ nâu', 'khunggo.jpg', 50000, 100, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 4, 0),
(28, 'Khung ảnh gỗ trắng', 'khunggo2.jpg', 50000, 100, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 4, 0),
(29, 'Cốc hai màu', 'coc2mau.jpg', 100000, 100, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 1, 0),
(30, 'Cốc đổi màu', 'cocdoimau.jpg', 100000, 80, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 1, 0),
(31, 'Cốc hải tặc', 'cochaitac.jpg', 100000, 100, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 1, 0),
(32, 'Cốc mèo', 'cocmeo.jpg', 100000, 100, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 1, 0),
(33, 'Cốc nốt nhạc', 'cocnotnhac.jpg', 100000, 100, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 1, 0),
(34, 'Cốc thỏ', 'coctho.jpg', 100000, 90, 'Quả cầu tuyết giáng sinh ấm áp có kích thước 12 x 16 cm.\r\n\r\nPhát nhạc bằng cót, có đèn đổi màu ở cả chân đế và quả cầu.\r\n\r\nKhi phát nhạc, nội thất trong quả cầu có thể xoay tròn và tuyết tự phun mà không cần phải lắc.\r\n\r\nĐây là mẫu quả cầu tuyết cao cấp nên các chi tiết đều được làm vô cùng sắc nét và tinh tế.\r\n\r\nMẫu quả cầu tuyết này có số lượng giới hạn nên hãy nhanh tay đặt hàng nhé.', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(10) NOT NULL,
  `image` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `content` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(11) NOT NULL,
  `idRoles` int(11) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `idRoles`, `username`, `password`, `name`, `address`, `phone`) VALUES
(9, 0, 'thanh', 'd41d8cd98f00b204e9800998ecf8427e', 'Thanh Le', 'KTX KHU B ĐHQG, Phường Linh Trung, Quận Thủ Đức, TP. Hồ Chí Minh', '866571001'),
(11, 1, 'locchiu', '202cb962ac59075b964b07152d234b70', 'Phú lộc', 'tt', '866571001'),
(12, 1, 'user01', '202cb962ac59075b964b07152d234b70', 'user 01', 'userr 12344', '0123'),
(13, 1, 'user02', '202cb962ac59075b964b07152d234b70', 'Le Van Thanh', '24144', '123'),
(17, 0, 'user04', '202cb962ac59075b964b07152d234b70', 'thanh', 'levanthan 12345', '123666'),
(21, 1, 'admin', '202cb962ac59075b964b07152d234b70', 'Admin', 'Admin', '0123556');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Chỉ mục cho bảng `billdetails`
--
ALTER TABLE `billdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idProduct` (`productId`,`orderId`),
  ADD KEY `IDBILL` (`orderId`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `danhsach`
--
ALTER TABLE `danhsach`
  ADD PRIMARY KEY (`maDS`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`maLoai`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSP`),
  ADD UNIQUE KEY `tenSP` (`tenSP`),
  ADD KEY `sanpham_ibfk_1` (`maLoai`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `billdetails`
--
ALTER TABLE `billdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `danhsach`
--
ALTER TABLE `danhsach`
  MODIFY `maDS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `maLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `billdetails`
--
ALTER TABLE `billdetails`
  ADD CONSTRAINT `billdetails_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `bill` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`maLoai`) REFERENCES `loaisanpham` (`maLoai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
