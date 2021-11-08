-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 09, 2021 lúc 12:32 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `van_phong_pham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_pass` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'admin', 'admin@gmail.com', '123456'),
(2, 'ncc1', '', ''),
(3, 'ncc2', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id` int(11) NOT NULL,
  `kh_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `binh_luan_noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `binh_luan_ngay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id`, `kh_id`, `sp_id`, `binh_luan_noi_dung`, `binh_luan_ngay`) VALUES
(2, 1, 13, 'This is verry good', '2021-11-08'),
(4, 1, 13, 'This is verry good', '2021-11-08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_don_hang`
--

CREATE TABLE `ct_don_hang` (
  `san_pham_id` int(11) NOT NULL,
  `chi_tiet_so_luong` int(11) NOT NULL,
  `don_hang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ct_don_hang`
--

INSERT INTO `ct_don_hang` (`san_pham_id`, `chi_tiet_so_luong`, `don_hang_id`) VALUES
(1, 1, 0),
(6, 1, 0),
(2, 1, 0),
(2, 1, 0),
(2, 1, 12),
(8, 3, 12),
(5, 1, 12),
(13, 1, 0),
(4, 4, 0),
(13, 1, 18),
(5, 1, 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `dh_ten_nguoi_nhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dh_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dh_dia_chi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dh_sdt` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dh_tong_tien` int(11) NOT NULL,
  `tinh_trang_id` int(11) NOT NULL,
  `dh_hinh_thuc_tt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dh_ngay_tao` date NOT NULL,
  `dh_ghi_chu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kh_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id`, `dh_ten_nguoi_nhan`, `dh_email`, `dh_dia_chi`, `dh_sdt`, `dh_tong_tien`, `tinh_trang_id`, `dh_hinh_thuc_tt`, `dh_ngay_tao`, `dh_ghi_chu`, `kh_id`) VALUES
(14, 'Thanh Hương', 'thanhhan@gmail.com', 'Nha Trang', '0987654321', 10800, 1, 'offline', '2021-11-05', 'Gọi trước khi giao', 1),
(15, 'Ngô Thanh Hân', 'thanhhan@gmail.com', 'Nha Trang', '0987654321', 657000, 1, 'online', '2021-11-07', '', 1),
(16, 'Ngô Thanh Hân', 'thanhhan@gmail.com', 'Nha Trang', '0123456789', 28000, 1, 'online', '2021-11-08', '', 1),
(17, 'Ngô Thanh Hân', 'thanhhan@gmail.com', 'Nha Trang', '0123456789', 463000, 1, 'online', '2021-11-08', '', 1),
(18, 'Ngô Thanh Hân', 'thanhhan@gmail.com', 'Nha Trang', '0123456789', 756000, 1, 'online', '2021-11-08', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int(11) NOT NULL,
  `kh_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `gio_hang_so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `kh_hoten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kh_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kh_pass` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kh_sdt` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kh_dia_chi` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `kh_hoten`, `kh_email`, `kh_pass`, `kh_sdt`, `kh_dia_chi`) VALUES
(1, 'Ngô Thanh Hân', 'thanhhan@gmail.com', '12345', '0123456789', 'Nha Trang'),
(2, 'Trần Hữu Nghĩa', 'huunghia@gmail.com', '12345', '0987654321', 'Cam Ranh'),
(4, 'Kim Thoa', 'thoakim3012@gmail.com', '12345', '0987654321', 'Nha Trang'),
(5, 'Hạnh Nguyễn', 'hanh@gmail.com', '12345', '0987654321', 'Ninh Thuận'),
(6, 'lý tiểu long', 'long@gmail.com', '12345', '0987654321', 'Ninh Thuận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_hang`
--

CREATE TABLE `loai_hang` (
  `id` int(11) NOT NULL,
  `loai_hang_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_hang`
--

INSERT INTO `loai_hang` (`id`, `loai_hang_ten`, `anh`) VALUES
(1, 'Bút viết', 'but_viet.jpg'),
(2, 'Dụng cụ học sinh', 'dung_cu_hs.png'),
(3, 'Sản phẩm về giấy', 'sp_giay.png'),
(4, 'Dụng cụ văn phòng', 'dc_vanphon.jpg'),
(5, 'Dụng cụ vẽ', 'dung_cu_ve.jpg'),
(6, 'Sản phẩm điện tử', 'sp_dien_tu.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `id` int(11) NOT NULL,
  `ncc_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ncc_dia_chi` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ncc_sdt` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ncc_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`id`, `ncc_ten`, `ncc_dia_chi`, `ncc_sdt`, `ncc_email`) VALUES
(1, 'Cty TM Hạnh Thuận', 'Hồ Chí Minh', '', 'hanhthuan@gmail.com'),
(2, 'Thiên Long Hoàn Cầu', 'Hồ Chí Minh', '', 'hoancau@gmail.com'),
(3, 'Bình Tây', 'Hồ Chí Minh', '', 'binhtay@gmail.com'),
(4, 'Cty Văn Phòng Sáng Tạo (Stacom)', 'Hồ Chí Minh', '', 'stacom@gmail.com'),
(5, 'Cty Fabico', 'Hồ Chí Minh', '', 'fabico@gmail.com'),
(6, 'Fahasa Print', 'Hồ Chí Minh', '', 'fahasaprint@gmail.com'),
(7, 'KOKUYO', 'Hồ Chí Minh', '', 'kokuyo@gmail.com'),
(8, 'Vận Tải Quốc Anh', 'Hồ Chí Minh', '', 'quocanh@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `sp_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_so_luong` int(11) NOT NULL,
  `sp_gia` int(11) NOT NULL,
  `sp_anh` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_anh1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_anh2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_anh3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_mo_ta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `loai_id` int(11) NOT NULL,
  `ncc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `sp_ten`, `sp_so_luong`, `sp_gia`, `sp_anh`, `sp_anh1`, `sp_anh2`, `sp_anh3`, `sp_mo_ta`, `loai_id`, `ncc_id`) VALUES
(1, 'Bút Bi 0.5 mm Thiên Long TL-089 - Mực Xanh', 100, 3800, 'but_bi_thien_long_xanh.jpg', 'but_bi_thien_long_xanh_1.jpg', 'but_bi_thien_long_xanh_2.jpg', 'but_bi_thien_long_xanh_3.jpg', 'Bút Bi TL-089 có thiết kế ấn tượng. Toàn bộ thân bút làm từ nhựa trong, phối hợp hoàn hảo với màu ruột bút bên trong.', 1, 1),
(2, 'Bút Chì Gỗ 2B Staedtler 132 40NC12', 100, 3200, 'but_chi_go_2b.jpg', 'but_chi_go_2b_1.jpg', 'but_chi_go_2b_2.jpg', 'but_chi_go_2b_2.jpg', '<p><strong>Bút Chì Mộc 2B - Staedler 132 40NC12</strong></p>\r\n<ul>\r\n<li> Thân mộc không sơn, có tẩy. Với hàm lượng carbon cao giúp viết êm, cầm nắm chắc chắn.</li>\r\n\r\n<li> Nét vẽ mượt, ruột chì chắc khó gẫy, độ tương phản cao, thân gỗ tự nhiên</li>\r\n\r\n<li> Bút chì dùng để ghi chú, luyện chữ, vẽ nghệ thuật, phác họa</li>\r\n\r\n<li> Độ cứng: 2B</li>\r\n</ul>', 1, 2),
(3, 'Gôm Chì Siêu Mềm Nhỏ Pentel ZEH-05', 100, 13000, '3_gomchi.jpg', '3_gomchi_1.jpg', '3_gomchi_2.jpg', '3_gomchi_3.jpg', 'Gôm Chì Siêu Mềm Nhỏ Pentel ZEH-05\r\n\r\nSản phẩm là loại gôm chì cao cấp, dành cho văn phòng & học sinh, dễ dàng tẩy xóa vết chì mà không cần tốn nhiều công sức.\r\n\r\nSử dụng thuận tiện trong học tập và trong văn phòng.\r\n\r\nSản phẩm giúp tẩy nhanh với khối lượng cần tẩy lớn, bạn sẽ chủ động hơn trong việc dùng gôm với thời gian sử dụng lâu dài.\r\n\r\nTẩy siêu sạch, không bị dơ (bẩn) khi sử dụng.\r\n\r\nGôm hiệu Pentel với độ bền dẻo cao có khả năng tẩy sạch các vết chì đen mà không gây nhăn hay rách giấy.\r\n\r\nĐược làm từ chất liệu Polymer cao cấp, gôm Pentel siêu mềm và siêu dẻo, không giòn gẫy hay khô cứng theo thời gian mà luôn giữ nguyên tính chất mềm mại, sẵn sàng cho bạn sử dụng.\r\n\r\nMã hàng	3474370260505\r\nNhà Cung Cấp	Cty Văn Phòng Sáng Tạo (Stacom)\r\nThương Hiệu	Pentel\r\nXuất Xứ Thương Hiệu	Thương Hiệu Nhật\r\nNơi Gia Công & Sản Xuất	Đài Loan\r\nMàu sắc	Trắng\r\nChất liệu	Cao Su\r\nTrọng lượng (gr)	20\r\nKích Thước Bao Bì	4.3 x 2 x 1.3 cm\r\nSản phẩm hiển thị trong	\r\nMUA SẮM AN TOÀN NGÀN DEAL GIẢM SỐC - Giảm Khủng Đến 60%\r\nÔng Trùm Trường Học\r\nBACK TO SCHOOL\r\nSách Giáo Khoa - Tham Khảo Các Cấp\r\nCty Văn Phòng Sáng Tạo (Stacom)\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Gôm - tẩy bán chạy của tháng\r\nGôm Chì Siêu Mềm Nhỏ Pentel ZEH-05\r\n\r\nSản phẩm là loại gôm chì cao cấp, dành cho văn phòng & học sinh, dễ dàng tẩy xóa vết chì mà không cần tốn nhiều công sức.\r\n\r\nSử dụng thuận tiện trong học tập và trong văn phòng.\r\n\r\nSản phẩm giúp tẩy nhanh với khối lượng cần tẩy lớn, bạn sẽ chủ động hơn trong việc dùng gôm với thời gian sử dụng lâu dài.\r\n\r\nTẩy siêu sạch, không bị dơ (bẩn) khi sử dụng.\r\n\r\nGôm hiệu Pentel với độ bền dẻo cao có khả năng tẩy sạch các vết chì đen mà không gây nhăn hay rách giấy.\r\n\r\nĐược làm từ chất liệu Polymer cao cấp, gôm Pentel siêu mềm và siêu dẻo, không giòn gẫy hay khô cứng theo thời gian mà luôn giữ nguyên tính chất mềm mại, sẵn sàng cho bạn sử dụng.', 2, 2),
(4, 'Mực Viết Máy Queen - Mực Tím', 100, 13000, '4_muc_may_queen.jpg', '4_muc_may_queen_1.jpg', '4_muc_may_queen_2.jpg', '4_muc_may_queen_3.jpg', 'Mực Viết Máy Queen\r\n\r\nNhững chiếc bút mực là vật dụng gắn bó trong suốt quãng đời đi học với các em học sinh.\r\n\r\nĐể viết được nét chữ nhanh, đẹp và không bị dây bẩn, các em cần lựa chọn loại mực có chất lượng tốt.\r\n\r\nSản phẩm Mực Queen có màu mực đẹp, rõ nét, không bị nhòe và bay màu sẽ là sự lựa chọn tuyệt vời cho các em.\r\n\r\nMực Queen phù hợp với tất cả các dòng bút máy, mực không bị lắng cặn nên sẽ giúp bảo trì ngòi bút hiệu quả hơn so với các dòng mực thông thường.\r\n\r\nMực Queen có dung tích 30ml giúp bạn có thể sử dụng được nhiều lần, lâu dài mà vẫn đảm bảo chất lượng của sản phẩm.\r\n\r\nMã hàng	8935015812367\r\nNhà Cung Cấp	Cty Trần Vĩnh Phát\r\nThương Hiệu	Queen\r\nXuất Xứ Thương Hiệu	Việt Nam\r\nNơi Gia Công & Sản Xuất	Việt Nam\r\nMàu sắc	Tím\r\nMàu Mực	Tím\r\nChất liệu	Thủy Tinh\r\nTrọng lượng (gr)	100\r\nKích Thước Bao Bì	5.5 x 5.5 x 3 cm\r\nSản phẩm hiển thị trong	\r\nMUA SẮM AN TOÀN NGÀN DEAL GIẢM SỐC - Giảm Khủng Đến 60%\r\nÔng Trùm Trường Học\r\nBACK TO SCHOOL\r\nSách Giáo Khoa - Tham Khảo Các Cấp\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Mực bán chạy của tháng\r\nMực Viết Máy Queen\r\n\r\nNhững chiếc bút mực là vật dụng gắn bó trong suốt quãng đời đi học với các em học sinh.\r\n\r\nĐể viết được nét chữ nhanh, đẹp và không bị dây bẩn, các em cần lựa chọn loại mực có chất lượng tốt.\r\n\r\nSản phẩm Mực Queen có màu mực đẹp, rõ nét, không bị nhòe và bay màu sẽ là sự lựa chọn tuyệt vời cho các em.\r\n\r\nMực Queen phù hợp với tất cả các dòng bút máy, mực không bị lắng cặn nên sẽ giúp bảo trì ngòi bút hiệu quả hơn so với các dòng mực thông thường.\r\n\r\nMực Queen có dung tích 30ml giúp bạn có thể sử dụng được nhiều lần, lâu dài mà vẫn đảm bảo chất lượng của sản phẩm.', 2, 2),
(5, 'Ba Lô Thỏ Bảy Màu Talk! - “Gấu Aka” Fan Edition - BLFE02', 100, 345000, '5_balo_tho_talk.jpg', '5_balo_tho_talk_1.jpg', '5_balo_tho_talk_2.jpg', '5_balo_tho_talk_3.jpg', 'Ba Lô “Gấu Aka” Fan Edition - Thỏ Bảy Màu - BLFE02\r\n\r\nSản phẩm nằm trong bộ sưu tập “I\'M THOR” - series sản phẩm ba lô và phụ kiện mang bản quyền chính thức của Thỏ Bảy Màu được giới thiệu bởi thương hiệu HooHooHaHa®.\r\n\r\nBa lô “Gấu Aka” fan edition với màu midnight green độc đáo và cá tính mang lại sự khác lạ đặc biệt cho bạn khi sử dụng.\r\n\r\nBạn là fan của Thỏ Bảy Màu, bạn đang tìm kiếm ba lô đi chơi, đi học? Ba lô “Gấu Aka” fan edition là lựa chọn tuyệt vời để thể hiện với đám bạn.\r\n\r\nThiết kế hiện đại, độc đáo và thời trang: Ba lô được thiết kế độc đáo theo phong cách trẻ trung, năng động với ngăn chia bên ngoài tiện lợi, quai đeo bền chắc cùng kiểu dáng kết hợp tinh tế, hiện đại, tạo nên sự hài hòa tuyệt đối.\r\n\r\nDễ dàng phối đồ: Ba lô với tông màu midnight green bắt mắt, không chỉ giúp bạn thể hiện phong cách thời trang cá tính mà còn rất dễ dàng khi phối đồ. Ba lô có thể kết hợp cùng nhiều trang phục như: quần jean, áo thun và các phụ kiện khác để trở nên thật nổi bật.\r\n\r\nChất liệu cao cấp & bền: Ba lô “Gấu Aka” fan edition được làm từ chất liệu vải cao cấp không thấm nước, an toàn, đựng vừa laptop 15 inch, luôn đem lại cảm giác mềm mại, êm vai khi sử dụng và bền chắc.\r\n\r\nĐường may tỉ mỉ chắc chắn: Đường may của ba lô vô cùng tỉ mỉ và tinh tế, đảm bảo độ bền chắc trong suốt thời gian bạn sử dụng. Chiếc ba lô sẽ mang đến cho bạn vẻ đẹp thật trẻ trung và năng động.\r\n\r\nMang ngay Ba lô “Gấu Aka” fan edition về nhà để khoe với đám bạn nào.\r\n\r\nMã hàng	8936183831495\r\nTên Nhà Cung Cấp	Công Ty TNHH Headfully\r\nNăm XB	2019\r\nThương Hiệu	HooHooHaHa®\r\nXuất Xứ Thương Hiệu	Việt Nam\r\nNơi Gia Công & Sản Xuất	Trung Quốc\r\nMàu sắc	Xanh Lá Đậm\r\nChất liệu	Vải\r\nTrọng lượng (gr)	700\r\nKích Thước Bao Bì	42 x 30 x 14 cm\r\nSản phẩm hiển thị trong	\r\nBa Lô\r\nBALO CÁC LOẠI\r\nCông Ty TNHH Headfully\r\nMUA SẮM AN TOÀN NGÀN DEAL GIẢM SỐC - Giảm Khủng Đến 60%\r\nBACK TO SCHOOL\r\nSách Giáo Khoa - Tham Khảo Các Cấp\r\nSĂN BALO COUPLE CÙNG THỎ BẢY MÀU\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Cặp - Ba Lô bán chạy của tháng\r\nBa Lô “Gấu Aka” Fan Edition - Thỏ Bảy Màu - BLFE02\r\n\r\nSản phẩm nằm trong bộ sưu tập “I\'M THOR” - series sản phẩm ba lô và phụ kiện mang bản quyền chính thức của Thỏ Bảy Màu được giới thiệu bởi thương hiệu HooHooHaHa®.\r\n\r\nBa lô “Gấu Aka” fan edition với màu midnight green độc đáo và cá tính mang lại sự khác lạ đặc biệt cho bạn khi sử dụng.\r\n\r\nBạn là fan của Thỏ Bảy Màu, bạn đang tìm kiếm ba lô đi chơi, đi học? Ba lô “Gấu Aka” fan edition là lựa chọn tuyệt vời để thể hiện với đám bạn.\r\n\r\nThiết kế hiện đại, độc đáo và thời trang: Ba lô được thiết kế độc đáo theo phong cách trẻ trung, năng động với ngăn chia bên ngoài tiện lợi, quai đeo bền chắc cùng kiểu dáng kết hợp tinh tế, hiện đại, tạo nên sự hài hòa tuyệt đối.\r\n\r\nDễ dàng phối đồ: Ba lô với tông màu midnight green bắt mắt, không chỉ giúp bạn thể hiện phong cách thời trang cá tính mà còn rất dễ dàng khi phối đồ. Ba lô có thể kết hợp cùng nhiều trang phục như: quần jean, áo thun và các phụ kiện khác để trở nên thật nổi bật.\r\n\r\nChất liệu cao cấp & bền: Ba lô “Gấu Aka” fan edition được làm từ chất liệu vải cao cấp không thấm nước, an toàn, đựng vừa laptop 15 inch, luôn đem lại cảm giác mềm mại, êm vai khi sử dụng và bền chắc.\r\n\r\nĐường may tỉ mỉ chắc chắn: Đường may của ba lô vô cùng tỉ mỉ và tinh tế, đảm bảo độ bền chắc trong suốt thời gian bạn sử dụng. Chiếc ba lô sẽ mang đến cho bạn vẻ đẹp thật trẻ trung và năng động.\r\n\r\nMang ngay Ba lô “Gấu Aka” fan edition về nhà để khoe với đám bạn nào.', 2, 8),
(6, 'Tập Sinh Viên Life - Kẻ Ngang 200 Trang ĐL 70g/m2 - FAHASA (Mẫu Màu Giao Ngẫu Nhiên)', 100, 23000, '6_tap_life.jpg', '6_tap_life_1.jpg', '6_tap_life_2.jpg', '6_tap_life_3.jpg', 'Tập 200 Trang Kẻ Ngang - Ford 70gsm KHM - LIFE\r\n\r\nBìa tập giấy kraft trơn 17x25cm. Với mặt giấy láng mịn, viết êm tay, tạo nét chữ đẹp. Giấy viết không bị lem, độ trắng không làm hại mắt, ăn mực hầu hết các loại bút, giấy viết không nhòe, không thấm mực ra trang sau.\r\n\r\nQuyển tập có đường kẻ ô ly rõ ràng, đều đặn giúp các em học sinh viết chữ đẹp hơn, nắn nót hơn.\r\n\r\nSản phẩm sẽ là người bạn đồng hành giúp các bạn nhỏ học tốt hơn, góp phần đưa các em vươn tới sức mạnh của tri thức.\r\n\r\nLà một món quà độc đáo bạn có thể dành tặng cho người thân, bạn bè thay cho những lời chúc ý nghĩa nhất.\r\n\r\nMã hàng	8934986006669\r\nTên Nhà Cung Cấp	Fahasa Print\r\nThương Hiệu	FAHASA\r\nXuất Xứ Thương Hiệu	Việt Nam\r\nNơi Gia Công & Sản Xuất	Việt Nam\r\nMàu sắc	Nâu\r\nChất liệu	Giấy\r\nTrọng lượng (gr)	310\r\nKích Thước Bao Bì	25 x 17 x 1 cm\r\nSản phẩm hiển thị trong	\r\nMUA SẮM AN TOÀN NGÀN DEAL GIẢM SỐC - Giảm Khủng Đến 60%\r\nÔng Trùm Trường Học\r\nBACK TO SCHOOL\r\nSách Giáo Khoa - Tham Khảo Các Cấp\r\nTập Vở FAHASA\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tập - Vở bán chạy của tháng\r\nTập 200 Trang Kẻ Ngang - Ford 70gsm KHM - LIFE\r\n\r\nBìa tập giấy kraft trơn 17x25cm. Với mặt giấy láng mịn, viết êm tay, tạo nét chữ đẹp. Giấy viết không bị lem, độ trắng không làm hại mắt, ăn mực hầu hết các loại bút, giấy viết không nhòe, không thấm mực ra trang sau.\r\n\r\nQuyển tập có đường kẻ ô ly rõ ràng, đều đặn giúp các em học sinh viết chữ đẹp hơn, nắn nót hơn.\r\n\r\nSản phẩm sẽ là người bạn đồng hành giúp các bạn nhỏ học tốt hơn, góp phần đưa các em vươn tới sức mạnh của tri thức.\r\n\r\nLà một món quà độc đáo bạn có thể dành tặng cho người thân, bạn bè thay cho những lời chúc ý nghĩa nhất.', 3, 3),
(7, 'Giấy photo Double A A4/70 gsm', 100, 84000, '7_giay_photo_double.jpg', '7_giay_photo_double_1.jpg', '7_giay_photo_double_2.jpg', '7_giay_photo_double_3.jpg', 'Giấy photo Double A A4/70 gsm với kích thước A4, thân thiện với môi trường và thích hợp với hầu hết các loại máy in phun, máy in laser, máy fax laser, máy photocopy.\r\n\r\nSản phẩm thiết kế khổ giấy A4, thích hợp sử dụng làm giấy in, photo trong các văn phòng hoặc trong gia đình. Bạn cũng có thể sử dụng để viết, vẽ sơ đồ hoặc phác thảo các bản vẽ một cách đơn giản và nhanh chóng.\r\n\r\nGiấy có bề dày tốt, bề mặt láng mịn, độ cản quang của giấy cao hơn do đó giảm hiện tượng nhìn thấu trang và cho phép sử dụng cả hai mặt giấy một cách toàn diện nhất.\r\n\r\nChất liệu giấy an toàn, không chứa chất gây độc hại và mùi khó chịu, thân thiện với môi trường và giúp bảo vệ sức khỏe người dùng, đặc biệt là mắt. Giấy mịn, bắt mực êm', 3, 3),
(8, 'Màu Nước TL WACO-03 (8 Màu)', 100, 54000, '8_mau_nuoc_TLwaco.jpg', '8_mau_nuoc_TLwaco_1.jpg', '8_mau_nuoc_TLwaco_2.jpg', '8_mau_nuoc_TLwaco_3.jpg', 'Màu Nước TL WACO-03 (8 Màu) cho độ sánh và độ phủ màu tốt, có thể sử dụng trực tiếp hoặc pha loãng tuỳ vào mức độ đậm nhạt khác nhau. Màu cho độ bám tốt và sắc màu chân thực khi lên giấy, không bị bệt hay gợn màu. Sản phẩm gồm 8 màu cơ bản có độ chuẩn màu cao nhất và tuyệt đối an toàn cho sức khoẻ người sử dụng.\r\n\r\nThông tin sản phẩm\r\n\r\nChất lượng màu cao cấp\r\n\r\n- Màu Nước Thiên Long WACO 03 (8 Màu) rất đa dạng về màu sắc nhưng vẫn cho độ chuẩn màu cao. Tông màu tươi sáng, chân thật, phù hợp cho mọi độ tuổi sử dụng.\r\n\r\n- Màu vẽ có độ sánh và mịn vừa đủ, độ phủ tốt, cho sắc màu sắc nét và rất đều màu. Màu có độ bám dính cực tốt và không thấm ra mặt sau của giấy, không hề lem chảy. Chú ý nên đảo đều màu trước khi sử dụng.\r\n\r\n- Khi bạn chồng màu và pha trộn màu tuỳ theo ý muốn của mình, sản phẩm vẫn cho ra màu có bộ bóng, tươi sáng và có độ chuẩn màu cao.\r\n\r\n- Màu khô nhanh trong không khí và rất bền màu, lâu phai theo thời gian, do đó những tác phẩm nghệ thuật của bạn có thể lưu giữ lâu dài.\r\n\r\nSản phẩm an toàn\r\n\r\n- Màu Nước Thiên Long WACO 03 (8 Màu) không chứa hóa chất độc hại, chất lượng đạt tiêu chuẩn quốc tế về độ bền và an toàn cho sức khỏe người dùng.\r\n\r\n- Màu không gây mùi khó chịu khi mở nắp và dễ dàng mất đi ngay sau khi vẽ, nên đảm bảo không gây ảnh hưởng đến không khí trong phòng.\r\n\r\nMã hàng	8935001840244\r\nTên Nhà Cung Cấp	Thiên Long Hoàn Cầu\r\nThương Hiệu	Thiên Long\r\nXuất Xứ Thương Hiệu	Việt Nam\r\nNơi Gia Công & Sản Xuất	Việt Nam\r\nMàu sắc	8 Màu\r\nChất liệu	Màu, Nước\r\nTrọng lượng (gr)	300\r\nSản phẩm hiển thị trong	\r\nThiên Long Hoàn Cầu\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Màu Vẽ bán chạy của tháng\r\nMàu Nước TL WACO-03 (8 Màu) cho độ sánh và độ phủ màu tốt, có thể sử dụng trực tiếp hoặc pha loãng tuỳ vào mức độ đậm nhạt khác nhau. Màu cho độ bám tốt và sắc màu chân thực khi lên giấy, không bị bệt hay gợn màu. Sản phẩm gồm 8 màu cơ bản có độ chuẩn màu cao nhất và tuyệt đối an toàn cho sức khoẻ người sử dụng.\r\n\r\nThông tin sản phẩm\r\n\r\nChất lượng màu cao cấp\r\n\r\n- Màu Nước Thiên Long WACO 03 (8 Màu) rất đa dạng về màu sắc nhưng vẫn cho độ chuẩn màu cao. Tông màu tươi sáng, chân thật, phù hợp cho mọi độ tuổi sử dụng.\r\n\r\n- Màu vẽ có độ sánh và mịn vừa đủ, độ phủ tốt, cho sắc màu sắc nét và rất đều màu. Màu có độ bám dính cực tốt và không thấm ra mặt sau của giấy, không hề lem chảy. Chú ý nên đảo đều màu trước khi sử dụng.\r\n\r\n- Khi bạn chồng màu và pha trộn màu tuỳ theo ý muốn của mình, sản phẩm vẫn cho ra màu có bộ bóng, tươi sáng và có độ chuẩn màu cao.\r\n\r\n- Màu khô nhanh trong không khí và rất bền màu, lâu phai theo thời gian, do đó những tác phẩm nghệ thuật của bạn có thể lưu giữ lâu dài.\r\n\r\nSản phẩm an toàn\r\n\r\n- Màu Nước Thiên Long WACO 03 (8 Màu) không chứa hóa chất độc hại, chất lượng đạt tiêu chuẩn quốc tế về độ bền và an toàn cho sức khỏe người dùng.\r\n\r\n- Màu không gây mùi khó chịu khi mở nắp và dễ dàng mất đi ngay sau khi vẽ, nên đảm bảo không gây ảnh hưởng đến không khí trong phòng.', 5, 5),
(9, 'Giấy Vẽ 20 Tờ Takeyo A4 8736', 100, 15000, '9_giay_ve_takeyo.jpg', '9_giay_ve_takeyo_1.jpg', '9_giay_ve_takeyo_2.jpg', '9_giay_ve_takeyo_3.jpg', 'Giấy Vẽ 20 Tờ Takeyo A4 8736\r\n\r\nLà sản phẩm bao gồm tập vẽ có kích thước khổ A4 phù hợp để vẽ tranh và các chi tiết lớn giúp bạn có thể thỏa niềm đam mê nghệ thuật hay yêu cầu công việc.\r\n\r\nChất liệu giấy vẽ cao cấp, bề mặt mềm mượt đạt chuẩn đảm bảo không bị nhàu nát, rách trong quá trình sử dụng.\r\n\r\nĐồng thời, sản phẩm có thể phù hợp với với nhiều loại bút như bút chì các loại, bút crayon,... và các loại màu như màu nước, màu sáp…', 5, 5),
(10, 'Kim Bấm Số 10 STS-02', 100, 3200, '10_kim_bam.jpg', '10_kim_bam_1.jpg', '10_kim_bam_2.jpg', '10_kim_bam_3.jpg', 'Kim Bấm Số 10 STS-02\r\n\r\nMẫu sản phẩm sẽ được giao ngẫu nhiên\r\n\r\nKim bấm số 10 kích thước nhỏ sử dụng cho bấm kim số 10, có các nhãn hiệu để các bạn chọn lựa phù hợp cho dụng cụ bấm kim, phục vụ thuận tiện trong quá trình kẹp bấm giấy tờ tài liệu số lượng ít, định lượng giấy mỏng nhanh chóng và dễ dàng.', 4, 4),
(11, 'Bìa Thiên Long 40 lá FO-DB02 Màu Xanh', 100, 55000, '11_bia_thien_long.jpg', '11_bia_thien_long_1.jpg', '11_bia_thien_long_2.jpg', '11_bia_thien_long_3.jpg', 'Bìa Thiên Long 40 lá FO-DB02 Màu Xanh\r\nBìa 40 lá (clear file 40 P) là bìa đựng hồ sơ có 40 lá trong suốt để đựng tài liệu khổ giấy A4.\r\nBìa 40 lá có kích thước: Chiều cao 307 mm, chiều ngang 240 mm, gáy 25 mm và độ dày 0.8 mm.\r\nTúi (pocket) có độ dày 0.04 mm.\r\nMàu sắc bìa đa dạng: màu xanh lá, xanh đậm, xanh biển, màu đỏ,...\r\nMỗi bìa có thể đực được tối thiểu 80 tờ giấy A4.\r\nCác sản phẩm cùng loại: Bìa 20 lá, bìa 60 lá, bìa 80 lá.\r\n\r\nLỢI ÍCH KHI SỬ DỤNG BÌA HỒ SƠ CÓ NHIỀU LÁ\r\nGiữ được nhiều tờ giấy A4, thuận tiện lưu trữ tài liệu có nhiều trang giấy.\r\nBảo quản hồ sơ được sạch sẽ, phẳng phiu.\r\nPhân loại tài liệu để dễ dàng tìm kiếm sau này.\r\nSắp xếp tài liệu được ngăn nắp gọn gàng, tạo tính chuyên nghiệp trong công ty.\r\nLưu trữ hình ảnh sản phẩm, bảng thiết kế để gửi cho đối tác xem - tăng thêm giá trị cho sản phẩm của bạn.\r\n\r\nMã hàng	8936040456731\r\nTên Nhà Cung Cấp	Thiên Long Hoàn Cầu\r\nThương Hiệu	Thiên Long\r\nXuất Xứ Thương Hiệu	Việt Nam\r\nNơi Gia Công & Sản Xuất	Việt Nam\r\nMàu sắc	Xanh Dương\r\nChất liệu	Nhựa\r\nTrọng lượng (gr)	325\r\nKích Thước Bao Bì	31 x 23 x 2.5 cm\r\nSản phẩm hiển thị trong	\r\nVăn Phòng Phẩm Bìa Flexoffice\r\nThiên Long Hoàn Cầu\r\nVăn Phòng Phẩm Flexoffice\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm File Hồ Sơ bán chạy của tháng\r\nBìa Thiên Long 40 lá FO-DB02 Màu Xanh\r\nBìa 40 lá (clear file 40 P) là bìa đựng hồ sơ có 40 lá trong suốt để đựng tài liệu khổ giấy A4.\r\nBìa 40 lá có kích thước: Chiều cao 307 mm, chiều ngang 240 mm, gáy 25 mm và độ dày 0.8 mm.\r\nTúi (pocket) có độ dày 0.04 mm.\r\nMàu sắc bìa đa dạng: màu xanh lá, xanh đậm, xanh biển, màu đỏ,...\r\nMỗi bìa có thể đực được tối thiểu 80 tờ giấy A4.\r\nCác sản phẩm cùng loại: Bìa 20 lá, bìa 60 lá, bìa 80 lá.\r\n\r\nLỢI ÍCH KHI SỬ DỤNG BÌA HỒ SƠ CÓ NHIỀU LÁ\r\nGiữ được nhiều tờ giấy A4, thuận tiện lưu trữ tài liệu có nhiều trang giấy.\r\nBảo quản hồ sơ được sạch sẽ, phẳng phiu.\r\nPhân loại tài liệu để dễ dàng tìm kiếm sau này.\r\nSắp xếp tài liệu được ngăn nắp gọn gàng, tạo tính chuyên nghiệp trong công ty.\r\nLưu trữ hình ảnh sản phẩm, bảng thiết kế để gửi cho đối tác xem - tăng thêm giá trị cho sản phẩm của bạn.', 4, 4),
(12, 'Máy Tính Casio FX580VN X-PK (Màu Hồng)', 100, 657000, '12_may_tinh_casio_hong.jpg', '12_may_tinh_casio_hong_1.jpg', '12_may_tinh_casio_hong_2.jpg', '12_may_tinh_casio_hong_3.jpg', 'Máy Tính Casio FX580VN X-PK (Màu Hồng) thuộc dòng máy tính khoa học ClassWiz, được hãng máy tính Casio Nhật Bản sản xuất dành riêng cho nền giáo dục Việt. Sản phẩm tích hợp tới 521 tính năng, trong đó có rất nhiều tính năng mà các dòng máy tính khoa học trên thị trường hiện nay không có được.\r\n\r\nCasio fx-580VN X được phép đưa vào phòng thi\r\n\r\nVới mong muốn có một máy tính cầm tay phù hợp với học sinh, sinh viên Việt Nam, Casio đã cho ra đời fx-580VN X sau một thời gian dài nghiên cứu. Sản phẩm đã lọt vào danh sách những máy tính cầm tay được đưa vào phòng thi theo công văn số 1568/BGDĐT-CNTT ngày 19/4/2018.\r\n\r\nTốc độ xử lý nhanh gấp 4 lần, giảm thời gian tính toán xuống mức tối thiểu\r\n\r\nSo với các dòng máy tính cầm tay trên thị trường thì Casio fx-580VN X có tốc độ xử lý nhanh nhất, gấp 4 lần nhờ sở hữu bộ xử lý hiệu suất cao. Thời gian thực hiện phép tính giảm xuống thấp nhất, rất tiện dụng khi sử dụng trong lớp học và đặc biệt trong các kỳ thi trắc nghiệm.\r\n\r\n521 tính năng, nhiều tính năng mà các máy tính khác không có\r\n\r\nTrong danh sách những dòng máy tính được Bộ Giáo dục và Đào tạo cho phép sử dụng trong các kỳ thi đến thời điểm này thì Casio fx-580VN X là chiếc máy tính có nhiều tính năng nhất, lên tới 521 tính năng.\r\n\r\nTrong đó, có rất nhiều tính năng mà các dòng máy tính trên thị trường chưa có được như:\r\n\r\n- Giải phương trình bậc 4\r\n\r\n- Giải bất phương trình bậc 4\r\n\r\n- Giải hệ phương trình bậc nhất 4 ẩn\r\n\r\n- 4 biến nhớ vectơ\r\n\r\n- Liệt kê tối đa 45 dòng giá trị cho bảng tính table\r\n\r\n- Tìm cực trị của hàm số bậc 3\r\n\r\n- Kiểm tra số nguyên tố có 4 chữ số có Logarit và cơ số bất kỳ\r\n\r\n- Báo vô nghiệm trong giải phương trình bậc 2\r\n\r\n- Lưu thương và dư trong phép chia\r\n\r\n- Kiểm tra đúng/sai…\r\n\r\nNgoài ra, máy tính Casio fx 580VN X nói riêng và dòng máy ClassWiz nói chung có chức năng hiệu suất cao mà các dòng khác không có được đó là 2 tính năng: sử dụng bảng tính và phép tính ma trận 4 x 4. Đây là chức năng mà hãng máy tính Casio mới cải tiến mang lại nhiều lợi ích vượt trội cho người dùng.\r\n\r\nTừ khi Casio fx-580VN X ra đời, người dùng không cần phải tìm lại, xác nhận từng giá trị như các máy đời trước. Bởi “siêu phẩm” có thêm chức năng hiển thị danh sách các kết quả tính toán hàm và biến lưu trong bộ nhớ. Tính năng này vô cùng hữu dụng giúp rút gọn thời gian, giảm thao tác bấm nút và người dùng không phải nhớ quá nhiều giá trị trong khi làm toán.\r\n\r\nMua một lần, dùng nhiều cấp học\r\n\r\nMáy tính Casio fx-580VN X giải được rất nhiều dạng toán thuộc các cấp học: Trung học cơ sở, trung học phổ thông và đại học.\r\n\r\nHỗ trợ đắc lực giải toán cao cấp ở đại học\r\n\r\nMáy tính Casio fx 580VN X còn sở hữu năng lực điện toán cao có thể hỗ trợ nhiều phép toán cao cấp gồm:\r\n\r\nTính bảng tính: Rất hữu ích cho việc học thống kê một cách đơn giản. Chức năng này có thêm khả năng: nhập công thức đệ quy, áp dụng giả thuyết Riemann tính toán cao cấp.\r\nTính ma trận 4 x 4: một cách đơn giản và cho kết quả chính xác nhất. Còn các máy tính khác chỉ có thể giải được ma trận cấp 3, còn cấp 4 thì phải tính tay.\r\nTính phương trình với bốn ẩn số\r\nPhương trình bậc hai\r\nKhả năng tính phân phối thống kê nâng cao: không phải máy tính nào cũng có được như: Xác suất nhị thức; phân phối tích lũy nhị thức, mật độ xác suất bình thường, phân phối tích lũy chuẩn, phân phối tích lũy chuẩn nghịch đảo, xác suất Poisson, phân phối tích lũy Poisson…\r\nNgoài ra, máy tính Casio fx580VN X còn được tích hợp thêm tính năng tính tỷ lệ RATIO. Từ khi có Casio fx580 VNX bạn sẽ không cần phải tính tay các dạng toán, hóa có mức độ khó khá cao như: tính tỉ số, số mol, tam suất...\r\nDung lượng bộ nhớ lớn gấp 2 lần\r\n\r\nMáy tính Casio fx 580VN X có dung lượng bộ nhớ lớn gấp 2 lần so với các dòng máy trước giúp tốc độ tính toán cực nhanh, chỉ trong tích tắc. Dung lượng bộ nhớ của siêu phẩm là một con số vô cùng ấn tượng, không phải chiếc máy tính khoa học cầm tay nào cũng có thể làm được.\r\n\r\nĐộ phân giải gấp 4 lần, hiển thị đầy đủ phép tính\r\n\r\nChưa dừng lại ở đó, “siêu phẩm kỳ thi” còn sở hữu màn hình LCD có độ phân giải 192 x 63 điểm, cao gấp 4 lần so với các dòng máy trước đó giúp hiển thị rõ ràng các hệ phương trình và nội dung. Người dùng rất dễ dàng xem công thức phép tính, biểu tượng toán học một cách dễ dàng và đầy đủ.\r\n\r\nSản phẩm có thể hiển thị số lượng ký tự gấp 2 lần ở kích thước bình thường và 6 lần ở kích thước nhỏ trên màn hình so với những dòng máy tính khoa học ES Plus trước đó.\r\n\r\nNgười dùng có thể dễ dàng nhìn thấy các phép toán hiển thị trên màn hình trong mọi điều kiện ánh sáng. Màn hình còn LCD tiêu tốn ít dung lượng pin, tối ưu góc xem thẳng phía trên. Màn hình có thể tạo ra hiệu ứng mờ để giúp người dùng hạn chế tình trạng mỏi mắt khi sử dụng lâu dài.\r\n\r\nChưa dừng lại ở đó, máy tính Casio fx580VN X được trang bị các chức năng bảng tính cơ bản, bạn có thể thao tác được bảng tính lên tới 5 cột, 45 hàng, chứa được tối đa 170 mục dữ liệu. Chức năng bảng tính này rất hiếm dòng máy hiện nay có được. Nhờ vậy bạn sẽ không phải lo lắng khi nhập phép tính quá dài hay khó đọc như các dòng máy đời trước, tăng hiệu quả tính toán nhất là trong các kỳ thi quan trọng.\r\n\r\nCó ngôn ngữ tiếng Việt vô cùng tiện dụng\r\n\r\nVì là “siêu phẩm” dành riêng cho thế hệ học sinh, sinh viên Việt Nam nên máy tính Casio fx-580VN X có thêm phiên bản tiếng Việt.\r\n\r\nCòn phiên bản tiếng Anh thì ở dạng đầy đủ chứ không viết tắt nên rất dễ hiểu, giúp nâng cao khả năng ngoại ngữ khi sử dụng máy. Màn hình menu được thể hiện bằng các icon dễ hiểu và chọn phép tính nhanh chóng hơn các dòng máy trước.\r\n\r\nChất liệu bề mặt cao cấp, vân nổi 3D\r\n\r\nThân máy Casio fx-580VN X được thiết kế theo phong cách thanh lịch, vỏ trượt chắc chắn. Các họa tiết hình học được phối màu tươi sáng vừa dễ nhìn lại tạo nên vẻ đẹp riêng cho sản phẩm.\r\n\r\nBàn phím được kiết hợp: phím làm bằng plastic cực nhạy và phím kim loại tạo cảm giác sang trọng, lại tăng độ bền.\r\n\r\nGiao diện dễ hiểu nhưng kiểu dáng hiện đại, tiên tiến\r\n\r\nTất cả các ký hiểu, biểu tượng trên máy tính Casio fx-580VN X được hiển thị rõ ràng trên màn hình máy tính. Chỉ cần chọn biểu tượng trên menu, người dùng có thể dễ dàng chọn chức năng, chế độ mong muốn rất nhanh chóng hơn các dòng máy khác.\r\n\r\nCác công thức toán học, các ký hiệu biểu tượng toán học trên Casio fx-580VN X có định dạng giống hệt với sách giáo khoa nên rất dễ hiểu. Đây là một cải tiến hoàn toàn mới của dòng máy ClassWiz so với dòng MS.\r\n\r\n“Trợ thủ” phải đưa vào phòng thi nhất\r\n\r\nChính những tính năng nổi trội nên máy tính Casio fx-580VN X được đánh giá là công cụ nên đưa vào phòng thi nhất cho các môn toán, lý, hóa, sinh. Có Casio fx-580VN X, học sinh, sinh viên sẽ cảm thấy yên tâm, dễ dàng “gặt hái” điểm cao trong các kỳ thi quan trọng, nhất là thi trắc nghiệm.\r\n\r\nMã hàng	4549526611483\r\nTên Nhà Cung Cấp	Bình Tây\r\nThương Hiệu	Casio\r\nXuất Xứ Thương Hiệu	Thương Hiệu Nhật\r\nNơi Gia Công & Sản Xuất	Thái Lan\r\nMàu sắc	Hồng\r\nChất liệu	Nhựa, Kim Loại\r\nTrọng lượng (gr)	190\r\nKích Thước Bao Bì	17 x 8.4 x 2.5 cm\r\nSản phẩm hiển thị trong	\r\nBình Tây\r\nMUA SẮM AN TOÀN NGÀN DEAL GIẢM SỐC - Giảm Khủng Đến 60%\r\nÔng Trùm Trường Học\r\nBACK TO SCHOOL\r\nSách Giáo Khoa - Tham Khảo Các Cấp\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Máy tính điện tử bán chạy của tháng\r\nMáy Tính Casio FX580VN X-PK (Màu Hồng) thuộc dòng máy tính khoa học ClassWiz, được hãng máy tính Casio Nhật Bản sản xuất dành riêng cho nền giáo dục Việt. Sản phẩm tích hợp tới 521 tính năng, trong đó có rất nhiều tính năng mà các dòng máy tính khoa học trên thị trường hiện nay không có được.\r\n\r\nCasio fx-580VN X được phép đưa vào phòng thi\r\n\r\nVới mong muốn có một máy tính cầm tay phù hợp với học sinh, sinh viên Việt Nam, Casio đã cho ra đời fx-580VN X sau một thời gian dài nghiên cứu. Sản phẩm đã lọt vào danh sách những máy tính cầm tay được đưa vào phòng thi theo công văn số 1568/BGDĐT-CNTT ngày 19/4/2018.\r\n\r\nTốc độ xử lý nhanh gấp 4 lần, giảm thời gian tính toán xuống mức tối thiểu\r\n\r\nSo với các dòng máy tính cầm tay trên thị trường thì Casio fx-580VN X có tốc độ xử lý nhanh nhất, gấp 4 lần nhờ sở hữu bộ xử lý hiệu suất cao. Thời gian thực hiện phép tính giảm xuống thấp nhất, rất tiện dụng khi sử dụng trong lớp học và đặc biệt trong các kỳ thi trắc nghiệm.', 6, 6),
(13, 'Máy Tính Văn Phòng Casio DX - 120B - W-DC', 100, 411000, '13_may_tinh_vp_casio.jpg', '13_may_tinh_vp_casio_1.jpg', '13_may_tinh_vp_casio_2.jpg', '13_may_tinh_vp_casio_3.jpg', 'Máy Tính Để Bàn Casio DX-120B\r\n\r\nMáy Tính Để Bàn Casio DX-120B là sản phẩm tiện ích, không thể thiếu trong việc tính toán hàng ngày. Máy tính có màn hình to rõ, hiển thị tới 12 số, các chữ số đã được bản đại hóa phân tách 4 chữ số thuận tiện. Máy tính có nhiều chức năng tính toán cơ bản cùng chức năng kiểm tra lại phép tính thông minh.\r\n- Thiết kế:\r\n\r\n+ Máy tính có thiết kế dạng để bàn tiện lợi, kích thước nhỏ gọn, tiện lợi.\r\n\r\n+ Màn hình lớn hiển thị tới 12 chữ số được bản địa hóa the định dạng dấu phân tách bốn chữ số.\r\n\r\n+ Vỏ máy làm bằng chất liệu nhựa cao cấp kháng vỡ. Bàn phím bằng nhựa dẻo in chữ số rõ ràng.\r\n\r\n+ Sử dụng nguồn 2 chiều: mặt trời và pin, chế độ pin được bật khi không đủ sáng.\r\n\r\n+ Các chức năng tính toán cơ bản: cộng, trừ, nhân, chia, tính tỷ lệ phần tram, tang giá, đổi tỷ giá.\r\n\r\n+ Có trang bị bộ nhớ đệm. Nhờ vậy sẽ không bị mất dữ liệu ngay cả khi nhập với tốc độ cao.', 6, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh_trang_dh`
--

CREATE TABLE `tinh_trang_dh` (
  `id` int(11) NOT NULL,
  `tinh_trang_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinh_trang_mo_ta` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinh_trang_dh`
--

INSERT INTO `tinh_trang_dh` (`id`, `tinh_trang_ten`, `tinh_trang_mo_ta`) VALUES
(1, 'Chờ duyệt', ''),
(2, 'Đã duyệt', ''),
(3, 'Đang giao', ''),
(4, 'Đã giao', ''),
(5, 'Đã hủy', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeu_thich`
--

CREATE TABLE `yeu_thich` (
  `id` int(11) NOT NULL,
  `kh_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `yeu_thich_ngay` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_hang`
--
ALTER TABLE `loai_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `_FK_loaisp` (`loai_id`),
  ADD KEY `_FK_ncc` (`ncc_id`);

--
-- Chỉ mục cho bảng `tinh_trang_dh`
--
ALTER TABLE `tinh_trang_dh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `yeu_thich`
--
ALTER TABLE `yeu_thich`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `loai_hang`
--
ALTER TABLE `loai_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tinh_trang_dh`
--
ALTER TABLE `tinh_trang_dh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `yeu_thich`
--
ALTER TABLE `yeu_thich`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `_FK_loaisp` FOREIGN KEY (`loai_id`) REFERENCES `loai_hang` (`id`),
  ADD CONSTRAINT `_FK_ncc` FOREIGN KEY (`ncc_id`) REFERENCES `nha_cung_cap` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
