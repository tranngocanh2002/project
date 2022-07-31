-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2022 at 04:03 PM
-- Server version: 5.7.39-0ubuntu0.18.04.2
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PHP0322E_db_nhom4`
--
CREATE DATABASE IF NOT EXISTS `PHP0322E_db_nhom4` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `PHP0322E_db_nhom4`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Tên danh mục',
  `type` tinyint(3) DEFAULT '0' COMMENT 'Loại danh mục: 0 - Product, 1 - News',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh danh mục',
  `description` text COMMENT 'Mô tả chi tiết cho danh mục',
  `status` tinyint(3) DEFAULT '0' COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo danh mục',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `avatar`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'giày đá bóng nike', 0, '1658562794-img1.jpg', '', 1, '2022-07-23 07:53:14', '2022-07-23 14:53:22'),
(2, 'giày đá bóng adidas', 0, '1658562866-img2.jpg', '', 1, '2022-07-23 07:54:26', '2022-07-23 14:54:32'),
(3, 'giày đá bóng puma', 0, '1658562906-img3.jpg', '', 1, '2022-07-23 07:55:06', '2022-07-23 14:55:13'),
(4, 'giày đá bóng mizuno', 0, '1658563039-img16.jpg', '', 1, '2022-07-23 07:57:19', NULL),
(5, 'găng tay thủ môn', 0, '1658563083-img14.jpeg', '', 1, '2022-07-23 07:58:03', NULL),
(6, 'giày đá bóng sân cỏ tự nhiên', 0, '1658563129-img5.jpg', '', 1, '2022-07-23 07:58:49', NULL),
(7, 'Giày đá bóng sân cỏ nhân tạo', 0, '1658563162-img12.jpg', '', 1, '2022-07-23 07:59:22', NULL),
(8, 'bóng chính hãng', 0, '1658563179-img11.jpeg', '', 1, '2022-07-23 07:59:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL COMMENT 'Id của danh mục mà tin tức thuộc về, là khóa ngoại liên kết với bảng categories',
  `name` varchar(255) NOT NULL COMMENT 'Tiêu đề tin tức',
  `summary` varchar(2555) DEFAULT NULL COMMENT 'Mô tả ngắn cho tin tức',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh tin tức',
  `content` text COMMENT 'Mô tả chi tiết cho sản phẩm',
  `status` tinyint(3) DEFAULT '0' COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `seo_title` varchar(255) DEFAULT NULL COMMENT 'Từ khóa seo cho title',
  `seo_description` varchar(255) DEFAULT NULL COMMENT 'Từ khóa seo cho phần mô tả',
  `seo_keywords` varchar(255) DEFAULT NULL COMMENT 'Các từ khóa seo',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `name`, `summary`, `avatar`, `content`, `status`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`, `title`) VALUES
(1, 2, 'Model giày Adidas X Speedportal chuẩn bị được ra mắt !', 'Model giày Adidas X Speedportal 2022 chuẩn bị được ra mắt, hình ảnh của chúng đã trở nên rõ ràng sau khi tiền đạo Thomas Muller sử dụng ở trên sân tập. Hiện đội tuyển quốc gia Đức đang tập trung và thi đấu trong loạt trận UEFA Nations League. Và Muller sử dụng một […]\r\nĐánh giá ưu, nhược điểm của giày đá bóng không dây\r\nNhững sai lầm phổ biến khi lựa chọn và sử dụng giày đá bóng\r\nChia sẻ cách loại bỏ mùi hôi từ giày đá bóng', '1658849960-news-1.jpg', 'Model giày Adidas X Speedportal 2022 chuẩn bị được ra mắt, hình ảnh của chúng đã trở nên rõ ràng sau khi tiền đạo Thomas Muller sử dụng ở trên sân tập. Hiện đội tuyển quốc gia Đức đang tập trung và thi đấu trong loạt trận UEFA Nations League. Và Muller sử dụng một đôi giày Adidas X Speedportal .1 FG trong khi tập luyện chuẩn bị cho trận đấu giữa tuyển Đức và Hungary. Lưu ý là chỉ sử dụng để tập luyện thôi anh em nhé, ở trận đấu chính thức Muller vào sân ở phút 78 và không tạo nhiều dấu ấn. Vì model giày X Speedportal vẫn chưa ra mắt chính thức, chúng ta phải đợi sang giữa tháng 7/2022 nhé.\r\nỞ trên thế hệ mới Speedportal, Adidas lần đầu sử dụng nhận diện thương hiệu mới với logo Adidas không bao gồm phần chữ, mà chỉ có phần logo cách điệu. Tên colorway của màu này là Hi-vis Yellow/ Black, tức là màu xanh lá ngả vàng có chi tiết màu đen. Nằm trong bộ sưu tập Adidas Game Data nhằm chuẩn bị cho mùa giải 2022-2023 sắp tới.\r\n\r\n \r\n\r\nỞ trên model giày Adidas X Speedportal 2022 được thừa hưởng tất cả ưu điểm của X Speedflow và thêm một số nâng cấp. Mindset vẫn là dòng giày tốc độ, trọng lượng nhẹ và thiên hướng cho tiền đạo hoặc cầu thủ chạy cánh sử dụng. Hãng luôn tìm cách tối ưu theo hướng giảm trọng lượng nhưng tăng tính ổn định khi chơi bóng ở tốc độ cao, độ ôm chân luôn ở mức hoàn hảo. Tất cả chúng là nhờ hệ thống ổn định – Stability System, bao gồm cổ ôm bằng chất liệu Primeknit, khóa gót bằng chất liệu carbon.\r\n\r\nMột số đặc điểm nổi bật ở trên Adidas X Speedportal .1 FG trong Game Data pack 2022:\r\n\r\n \r\n\r\nGót giày được bổ sung lớp đệm silicone nhằm cải thiện độ êm và ôm chân, trước đó hãng sử dụng nỉ mềm cũng đã là rất tốt rồi nay còn có thêm silicone.\r\nKhung sườn giữa nguyên vật liệu sợi carbon đúc tấm nguyên khối, đây là trái tim của cuộc chiến giảm trọng lượng, một chiếc size 40 chỉ ở mức 200 gram. Sợi carbon khiến giá thành sản xuất đội lên nhiều nhưng xứng đáng.\r\nUpper được sản xuất với công nghệ cao hơn, khi kết hợp các loại vật liệu cùng nhau một các hoàn hảo. Ở trong cùng upper là một khung sườn làm từ sợi, nó tạo phom giày và độ ôm chân tuyệt vời. Trên lý thuyết dòng Adidas X Speedportal dành cho chân thon nhưng độ break-in khi gặp chân bè ngang của nó cũng tuyệt vời. Bên ngoài đó là lớp sợi primeknit mật độ cực cao, đàn hồi cực tốt, tạo độ mềm mại cho upper. Còn ngoài cùng là lớp da tổng hợp mỏng nhưng đủ dày để chống nước và tạo độ bám khi khống chế bóng.\r\nCổ giày kiểu liền, sử dụng primeknit, quan sát kĩ ta sẽ thấy nó được chuyển đổi cực kỳ uyển chuyển từ mật độ sợi dệt dày sang thưa hơn ở phần cổ giày. Nó giúp xỏ giày dễ dàng hơn nhưng đảm bảo độ ôm chân.\r\nGiá bán lẻ cho một đôi Speedportal .1 FG ở Việt Nam là 5500k, tức là tăng giá 500k so với thế hệ trước. Ở Châu Âu là 220 Euro, ở Anh là 180 GBP … phiên bản không dây Speedportal + cao hơn và chạm mốc gần 8 triệu.\r\nCác phiên bản giày đá bóng đế TF dành cho sân cỏ nhân tạo gồm có:\r\n\r\n \r\n\r\nGiày Adidas X Speedportal .3 TF, giá bán lẻ tiêu chuẩn là 2100k, tức là tăng giá chút ít, điều này dễ hiểu giá xăng cũng đang tăng kỷ lục trên toàn thế giới. Gần như mọi mặt hàng đều thiết lập một mức giá mới, màu đầu tiên ở Việt Nam cũng là màu xanh lá này luôn. Ở trên thế hệ mới này có thiết kế không quá khác biệt, nhưng nhiều sự thay đổi nhỏ tạo ra sức hấp dẫn mới. Tôi tin chắc rằng không khó để X Speedportal .3 TF chiếm các vị trí best selling.\r\nGiày Adidas X Speedportal .4 TF là bản phổ thông, dễ tiếp cận cho mọi đối tượng, mức giá tham khảo là 1600k.\r\nCao cấp nhất là phân khúc Adidas X Speedportal .1 TF, giá tham khảo là 3800k, hứa hẹn mang upper cực sịn sò của bản .1 FG, đi kèm bộ đế TF trọng lượng nhẹ và bộ đệm êm ái.\r\nHãy cùng www.soccerstore.vn cập nhật những thông tin mới nhất về sản phẩm nhé.', 1, '', '', '', '2022-07-26 15:39:20', '2022-07-26 22:40:21', 'Adidas blog'),
(2, 1, 'Giày Nike Mercurial Vapor SOS thể hiện quan điểm bảo vệ môi trường !', 'Giày Nike Mercurial Vapor SOS vừa được giới thiệu nhằm thể hiện quan điểm bảo vệ môi trường của hãng. Model này còn có một tên gọi khác là Mercurial Vapor Next Nature, nghĩa là thiên nhiên tiếp theo. 50% trọng lượng của sản phẩm này được làm từ vật liệu tái chế. Đây như […]', '1658850160-news-2.jpg', 'Giày Nike Mercurial Vapor SOS vừa được giới thiệu nhằm thể hiện quan điểm bảo vệ môi trường của hãng. Model này còn có một tên gọi khác là Mercurial Vapor Next Nature, nghĩa là thiên nhiên tiếp theo. 50% trọng lượng của sản phẩm này được làm từ vật liệu tái chế.\r\n\r\nĐây như là một xu thế khi mà các hãng giày đá bóng bắt đầu có nhiều sản phẩm như thế này. Hồi đầu năm 2022, Puma giới thiệu pack giày Puma First Mile với 2 model Puma Ultra và Puma Future làm từ rác thải nhựa. Sau đó là một loạt sản phẩm thời trang thể thao nữa, và họ định hướng tăng tỉ trọng nguyên liệu này từng năm.\r\nMẫu giày Nike Vapor SOS mang tông trắng ngà, tên màu là ‘Sail / Black / Light Arctic Pink / Total Orange’. Tất nhiên rồi, nó dựa trên một đôi Mercurial, phẩy Nike má ngoài là các đường chỉ khâu đen chạy liền, đế giày kiểu FG dành cho sân cỏ tự nhiên. Má trong giày là 8 logo Nike chập lại phần đầu móc, tạo hình bông hoa lạ mắt. Quan sát kĩ phần lưỡi gà thì đây là kiểu rời truyền thống, upper vẫn làm từ dạng sợi nhưng có lẽ không được sịn như trên bản Elite.\r\n\r\nNó đã được lên chân của Ada Hegerberg, nữ cầu thủ nổi tiếng người Na Uy, hiện là tiền đạo của CLB Division 1 Féminine Lyon. Cô là cầu thủ nữ đầu tiên dành danh hiệu Quả bóng vàng. Ada sẽ là người đầu tiên trên thế giới sử dụng sản phẩm này một cách thực thụ trên sân cỏ. Thể hiện nỗ lực thực sự của Nike nhằm mang lại gần hơn với đời sống chứ không chỉ là một chiến dịch truyền thông.', 1, '', '', '', '2022-07-26 15:42:40', NULL, 'Nike blog'),
(3, 3, 'Đánh giá ưu, nhược điểm của giày đá bóng không dây', 'Đánh giá ưu, nhược điểm của giày đá bóng không dây Bên cạnh những đôi giày có dây truyền thống, sự xuất hiện của những đôi giày đá bóng không dây được ví như một hơi thở mới lạ. Một phong cách thiết kế mới, đẹp mắt, độc đáo, nhưng hiệu quả sử dụng thì […]', '1658850414-news-3.jpg', 'Chất liệu hình thành của giày đá bóng không dây thường có khả năng ôm khít, đàn hồi hiệu quả, không bị lỏng lẻo trong suốt quá trình chơi bóng, dù có tăng tốc, vận động cường độ mạnh vẫn luôn an toàn.\r\n\r\nPhía ngoài, vị trí đế giày là hệ thống nhựa dẻo, bền chắc, hỗ trợ duy trì form giày ổn định, không khác gì một đôi giày có dây buộc nhưng thiết kế đơn giản và đẹp mắt hơn.\r\n\r\nGiày không dây được gia tặng diện tích bề mặt tiếp xúc bóng, giúp việc cảm nhận và xử lý bóng đạt được hiệu quả hơn.\r\nCổ thun của giày êm ái, ôm khít phần cổ chân, đem lại cảm giác chắc chắn,… mà lại không phải bận tâm đến chuyện buộc dây sao cho đẹp, cho an toàn.\r\n\r\nNhược điểm giày đá bóng không dây\r\nMặc dù phần cổ thun của giày giúp người đeo cảm nhận được sự an toàn, chắc chắn nhưng nó cũng là trở ngại lớn với họ trong quá trình đeo giày.\r\n\r\nNếu lựa chọn giày size rộng hơn so với bàn chân, người đeo sẽ phải đối mặt với tình trạng nhấc gót.\r\n\r\nVậy thì khi chơi bóng nên chọn giày có dây hay không dây?\r\nThực tế, để đưa ra một lựa chọn cụ thể, chúng ta cần căn cứ vào nhiều yếu tố khác nhau. ', 1, '', '', '', '2022-07-26 15:46:54', NULL, 'Gk blog'),
(4, 7, 'Black Friday 2021 – Early Access – giá cực khủng', '#BlackFriday chính thức mở truy cập sớm cho những tín đồ mua sắm. Mùa shopping lớn nhất trong năm đã bắt đầu, hàng trăm mẫu giày đá bóng giảm giá có một không hai. Cơ hội mua hàng giá tốt nhất trong năm. Chỉ còn 1 ngày nữa là Black Friday, tuy nhiên với những […]', '1658850529-news-4.jpg', '#BlackFriday chính thức mở truy cập sớm cho những tín đồ mua sắm.\r\n\r\nMùa shopping lớn nhất trong năm đã bắt đầu, hàng trăm mẫu giày đá bóng giảm giá có một không hai. Cơ hội mua hàng giá tốt nhất trong năm.\r\n\r\nChỉ còn 1 ngày nữa là Black Friday, tuy nhiên với những tín đồ của shop thì luôn có ưu tiên nha,\r\n\r\nae chỉ cần inbox để nhận link Access sớm nhé. link tại: http://m.me/soccerstore.vn \r\nHãy chia sẻ để nhiều bạn bè được có cơ hội tiếp cận cơ hội khủng duy nhất trong năm này!!! #soccerstorevn', 1, '', '', '', '2022-07-26 15:48:49', NULL, 'Tin sales');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'Id của user trong trường hợp đã login và đặt hàng, là khóa ngoại liên kết với bảng users',
  `fullname` varchar(255) DEFAULT NULL COMMENT 'Tên khách hàng',
  `address` varchar(255) DEFAULT NULL COMMENT 'Địa chỉ khách hàng',
  `mobile` int(11) DEFAULT NULL COMMENT 'SĐT khách hàng',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email khách hàng',
  `note` text COMMENT 'Ghi chú từ khách hàng',
  `price_total` int(11) DEFAULT NULL COMMENT 'Tổng giá trị đơn hàng',
  `payment_status` tinyint(2) DEFAULT NULL COMMENT 'Trạng thái đơn hàng: 0 - Chưa thành toán, 1 - Đã thành toán',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo đơn',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `address`, `mobile`, `email`, `note`, `price_total`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Trần Ngọc Ánh', 'Nam Định', 942267355, 'anh16102002tran@gmail.com', 'Đặt cho vui thôi', 12890000, NULL, '2022-07-23 14:26:58', NULL),
(4, NULL, 'Anh Thái', 'Số 1 ngõ 2', 1234567890, 'tranvanthai12345@gmail.com', 'Free', 3700000, NULL, '2022-07-26 16:08:55', NULL),
(5, NULL, 'Tuấn Trần', 'Lộc Hòa, Nam ĐỊnh', 898730459, 'tuantran992002@gmail.com', 'Freeship', 73140000, NULL, '2022-07-26 16:09:04', NULL),
(7, NULL, 'tna', 'Lộc Hoà Nam Định', 123, '111anh16102002tran@gmail.com', 'dddd', 3700000, NULL, '2022-07-26 16:09:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) DEFAULT NULL COMMENT 'Id của order tương ứng, là khóa ngoại liên kết với bảng orders',
  `product_name` varchar(150) DEFAULT NULL COMMENT 'Tên sp tại thời điểm đặt hàng',
  `product_price` int(11) DEFAULT NULL COMMENT 'Giá sản phẩm tương ứng tại thời điểm đặt hàng',
  `quantity` int(11) DEFAULT NULL COMMENT 'Số lượng sản phẩm tương ứng tại thời điểm đặt hàng',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_name`, `product_price`, `quantity`, `id`) VALUES
(1, 'Bóng Adidas Pyrostorm UCL Pro OMB- White/ Solar Red/ Solar Yellow/ Black GU0214', 3300000, 2, 2),
(4, 'Bóng Nike Flight Premier League 2021- 2022 OMB EPL DC2209-710', 3700000, 1, 8),
(5, 'Giày Adidas X Speedportal .1 TF Game Data pack màu xanh lá GW8973', 2940000, 6, 9),
(5, 'Bóng Nike Flight Premier League 2021- 2022 OMB EPL DC2209-710', 3700000, 15, 10),
(7, 'Bóng Nike Flight Premier League 2021- 2022 OMB EPL DC2209-710', 3700000, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL COMMENT 'Id của danh mục mà sản phẩm thuộc về, là khóa ngoại liên kết với bảng categories',
  `title` varchar(255) DEFAULT NULL COMMENT 'Tên sản phẩm',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh sản phẩm',
  `price` int(11) DEFAULT NULL COMMENT 'Giá sản phẩm',
  `amount` int(11) DEFAULT NULL COMMENT 'Số lượng sản phẩm trong kho',
  `summary` varchar(255) DEFAULT NULL COMMENT 'Mô tả ngắn cho sản phẩm',
  `content` text COMMENT 'Mô tả chi tiết cho sản phẩm',
  `status` tinyint(3) DEFAULT '0' COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `seo_title` varchar(255) DEFAULT NULL COMMENT 'Từ khóa seo cho title',
  `seo_description` varchar(255) DEFAULT NULL COMMENT 'Từ khóa seo cho phần mô tả',
  `seo_keywords` varchar(255) DEFAULT NULL COMMENT 'Các từ khóa seo',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `avatar`, `price`, `amount`, `summary`, `content`, `status`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`) VALUES
(2, 1, 'Nike Mercurial Vapor 15 TF Zoom – Mint Foam / Total Orange / Ghost Green – DJ5635-343', '1658563911-product-img1.png', 2090000, 5, 'Nike Mercurial', 'Thế hệ mới nhất của giày đá bóng Nike Mercurial Vapor, giày Nike Vapor 15 Academy TF dành cho sân cỏ nhân tạo, đế Zoom cải tiến cực kỳ đáng đồng tiền bát gạo.', 1, '', '', '', '2022-07-23 08:11:51', NULL),
(3, 2, 'Adidas Copa Kapitan .2 TF – Core Black / Gold Metallic – FZ3251', '1658563993-product-1.png', 2200000, 5, 'Adidas Copa', 'Giày bóng đá Adidas Copa Kapitan .2 TF – Core Black / Gold Metallic – FZ3251, giày đá bóng chính hãng, giày sân cỏ nhân tạo, giày bóng đá Adidas Copa, upper làm từ da thật – da bê cực mềm, đế giày kiểu TF phù hợp với sân cỏ nhân tạo…', 1, '', '', '', '2022-07-23 08:13:13', NULL),
(4, 2, 'Giày Adidas X Speedportal .1 TF Game Data pack màu xanh lá GW8973', '1658564051-product-2.png', 2940000, 5, 'Adidas X Speedportal', 'Giày bóng đá Adidas X Speedportal .1 TF Game Data pack màu xanh lá, mã sản phẩm GW8973, giày đá bóng chính hãng Adidas, phân khúc cao cấp nhất trong gia đình Adidas X, nằm trong thế hệ mới nhất mang tên X Speedportal. Kế thừa những tinh hoa đỉnh cao nhất của phân khúc […]', 1, '', '', '', '2022-07-23 08:14:11', '2022-07-23 15:15:44'),
(5, 3, 'Puma Future Z 1.2 Pro Cage TF – Green / White / Black – 106498-02', '1658564128-product-1.png', 2600000, 5, 'Puma Future Z', 'Siêu phẩm giày đá bóng Puma Future Z 1.2 Pro Cage TF – Green / White / Black – 106498-02, giày đá bóng cao cấp, giày bóng đá sân cỏ nhân tạo, upper làm từ da tổng hợp kết hợp sợi cực mềm!', 1, '', '', '', '2022-07-23 08:15:28', NULL),
(6, 3, 'Puma Ultra 3.3 TF màu xanh lá vàng chuối 106527-03', '1658564209-product-2.png', 1880000, 5, 'Puma Ultra', 'Giày đá bóng Giày bóng đá Puma Ultra 3.3 TF màu xanh lá vàng chuối , mã sản phẩm 106527-03 ,giày Puma Ultra hoàn toàn mới, giày bóng đá Puma Ultra cực đẹp, giày đá bóng Puma sân cỏ nhân tạo, giày Puma Ultra sân cỏ nhân tạo ...', 1, '', '', '', '2022-07-23 08:16:49', NULL),
(7, 4, 'Mizuno Morelia Sala Club TF màu xanh chuối _ MRL Sala Club Q1GB220345', '1658564270-product-1.png', 1590000, 5, 'Mizuno Morelia', 'Giày Mizuno Morelia Sala Club TF màu xanh chuối _ MRL Sala Club Q1GB220345, giày bóng đá chính hãng, giày đá bóng Mizuno Nhật Bản, upper làm từ da tổng hợp, đế giày kiểu TF phù hợp chơi bóng trên sân cỏ nhân tạo …. Mizuno Morelia Sala Club TF màu xanh chuối _ MRL […]', 1, '', '', '', '2022-07-23 08:17:50', NULL),
(8, 4, 'Mizuno Monarcida Neo Sala Pro TF màu trắng đế xanh Q1GB222127', '1658564314-product-2.png', 2190000, 5, 'Mizuno Monarcida', 'Giày bóng đá Mizuno Monarcida Neo Sala Pro TF màu trắng đế xanh Q1GB222127, giày Mizuno chính hãng, giày đá bóng Mizuno chính hãng, Mizuno Monarcida Neo Sala Pro cao cấp, upper làm từ da tổng hợp cực kì mềm mại, đế giày kiểu TF phù hợp chơi bóng trên sân cỏ nhân tạo … […]', 1, '', '', '', '2022-07-23 08:18:34', NULL),
(9, 5, 'Adidas Predator Pro GK Gloves màu đỏ cam GV0260', '1658565041-product-1.png', 2700000, 3, 'Adidas Predator Pro GK', 'Siêu phẩm găng tay thủ môn Adidas Predator Pro GK Gloves màu đỏ cam GV0260, mã sản phẩm GV0260, găng tay thủ môn chuyên nghiệp, phân khúc cao cấp nhất, được sử dụng bởi các thủ môn hàng đầu thế giới là David De Gea, Manuel Neuer hay Kepa… đây là phiên bản fingersave ', 1, '', '', '', '2022-07-23 08:30:41', NULL),
(10, 5, 'Adidas X GL Pro GK Gloves – màu đỏ cam GR1543', '1658565092-product-2.png', 2250000, 3, 'Adidas X GL Pro GK', 'Găng tay thủ môn Adidas X GL Pro GK Gloves – màu đỏ cam , mã sản phẩm GR1543, găng tay thủ môn chính hãng, găng tay bắt bóng Adidas X Pro ở phân khúc cao cấp nhất, đáp ứng nhu cầu chơi bóng chuyên nghiệp … – Mặt mút găng là URG 2.0S latex […]', 1, '', '', '', '2022-07-23 08:31:32', NULL),
(11, 5, 'Adidas Predator GL Pro Hybrid- màu đỏ cam GR1538', '1658565142-product-3.png', 2550000, 3, 'Adidas Predator', 'Siêu phẩm găng tay thủ môn Adidas Predator GL Pro Hybrid- màu đỏ cam GR1538 , mã sản phẩm GR1538, găng tay thủ môn chuyên nghiệp, phân khúc cao cấp nhất, được sử dụng bởi các thủ môn hàng đầu thế giới là David De Gea, Manuel Neuer hay Kepa… đây là phiên bản fingersave […]', 1, '', '', '', '2022-07-23 08:32:22', NULL),
(12, 5, 'Adidas X Training GK Gloves màu đỏ cam GR1539', '1658565191-product-4.png', 850000, 5, 'Adidas X Training GK', 'Găng tay thủ môn Adidas X Training GK Gloves màu đỏ cam GR1539, găng tay thủ môn chính hãng.', 1, '', '', '', '2022-07-23 08:33:11', NULL),
(13, 6, 'Adidas Predator Edge .3 L FG Game Data pack- Solar Red/ Team Solar Green/ Black GW0994', '1658565282-product-1.png', 1999000, 5, 'Adidas Predator', 'Adidas Predator Edge .3 L FG Game Data pack- Solar Red/ Team Solar Green/ Black GW0994, giày Adidas chính hãng, nằm trong bộ sưu tập giày Adidas Sapphire Edge pack, giày đá bóng Adidas Predator Edge… Model giày đá bóng Adidas mới nhất hướng tới một siêu giày kiểm soát bóng tối ưu, thiết kế cực […]', 1, '', '', '', '2022-07-23 08:34:42', NULL),
(14, 6, 'Nike Tiempo Legend 9 Academy AG – Black/ Iron Grey DB0627-004', '1658565335-product-2.png', 1800000, 5, 'Nike Tiempo', 'Giày bóng đá Nike Tiempo Legend 9 Academy AG – Black/ Iron Grey DB0627-004, giày bóng đá phù hợp đã sân cỏ tự nhiên và sân nhân tạo, giày đá bóng chính hãng Nike, upper làm từ da thật- da bê cực mềm, đế giày kiểu AG phù hợp chơi bóng trên sân cỏ tự […]', 1, '', '', '', '2022-07-23 08:35:35', NULL),
(15, 6, 'Nike Mercurial Vapor 14 Academy AG- Volt/ Bright Crimson/ Black CV0967-760', '1658565403-product-3.png', 1850000, 5, 'Nike Mercurial', 'Giày đá bóng Nike Mercurial Vapor 14 Academy AG- Volt/ Bright Crimson/ Black CV0967-760, giày bóng đá Nike chính hãng, giày bóng đá sân cỏ nhân tạo, đế giày kiểu AG phù hợp chơi bóng trên sân cỏ nhân tạo, upper làm từ da tổng hợp mềm, mỗi một thế hệ lại những yếu tố […]', 1, '', '', '', '2022-07-23 08:36:43', NULL),
(16, 6, 'Adidas X SpeedFlow .1 FG Numbers Up pack – Clear Onix/ White/ Solar Yellow FY6866', '1658565454-product-4.png', 3900000, 5, 'Adidas X SpeedFlow .1 FG Numbers Up pack – Clear Onix/ White/ Solar Yellow FY6866', 'Siêu phẩm giày Adidas X SpeedFlow .1 FG Numbers Up pack – Clear Onix/ White/ Solar Yellow , mã sản phẩm FY6866, phân khúc siêu cao cấp, trọng lượng siêu nhẹ với khoảng 200 gram/chiếc, nằm trong bộ sưu tập Numbers Up pack 2021. upper làm từ sợi kết hợp da tổng siêu mỏng và siêu […]', 1, '', '', '', '2022-07-23 08:37:34', NULL),
(17, 6, 'Adidas X SpeedFlow .1 FG Messi – Victory Blue/ Shock Pink/ Solar Yellow FY6879', '1658565499-product-5.png', 3999000, 5, 'Adidas X SpeedFlow .1 FG Messi – Victory Blue/ Shock Pink/ Solar Yellow FY6879', 'Siêu phẩm giày Adidas X SpeedFlow .1 FG Messi – Victory Blue/ Shock Pink/ Solar Yellow , mã sản phẩm FY6879, phân khúc siêu cao cấp, trọng lượng siêu nhẹ với khoảng 200 gram/chiếc, upper làm từ sợi kết hợp da tổng siêu mỏng và siêu mềm,  đế FG dành cho sân cỏ tự nhiên ! […]', 1, '', '', '', '2022-07-23 08:38:19', NULL),
(19, 6, 'Nike Mercurial Vapor 14 Elite FG – Recharge Sapphire / Volt / Blue Void – CQ7635-574', '1658565588-product-7.png', 4500000, 3, 'Nike Mercurial', 'Giày bóng đá Nike Mercurial Vapor 14 Elite FG – Recharge Sapphire / Volt / Blue Void – CQ7635-574, giày bóng đá Nike được yêu thích nhất trên thế giới, sản phẩm lên chân nhiều cầu thủ chuyên nghiệp nhất và ghi nhiều bàn thắng nhất tại các giải bóng đá hàng đầu thế giới, mang […]', 1, '', '', '', '2022-07-23 08:39:48', NULL),
(20, 6, 'Adidas X Speedflow .3 FG – Diamond Edge White Cloud White / Legacy Indigo / Hi-Res Blue – GW7480', '1658565638-product-8.png', 1700000, 2, 'Adidas X', 'Giày bóng đá Adidas X SpeedFlow .3 FG – Diamond Edge White Cloud White / Legacy Indigo / Hi-Res Blue – GW7480, mã sản phẩm GW7480, nằm trong bộ sưu tập Diamond Edge pack màu xanh trắng chủ đạo, giày đá bóng Adidas chính hãng, thuộc thế hệ giày Adidas X SpeedFlow mới nhất, được […]', 1, '', '', '', '2022-07-23 08:40:38', NULL),
(21, 7, 'Nike Mercurial Vapor 15 TF Zoom – Mint Foam / Total Orange / Ghost Green – DJ5635-343', '1658565789-product-1.png', 2090000, 5, 'Nike Mercurial', 'Thế hệ mới nhất của giày đá bóng Nike Mercurial Vapor, giày Nike Vapor 15 Academy TF dành cho sân cỏ nhân tạo, đế Zoom cải tiến cực kỳ đáng đồng tiền bát gạo.', 1, '', '', '', '2022-07-23 08:43:09', NULL),
(22, 7, 'Nike Phantom GT II Academy TF – Laser Orange / Black / Total Orange – DC0803-808', '1658565842-product-2.png', 1800000, 5, 'Nike Phantom', 'Giày đá bóng Nike Phantom GT II Academy TF – Laser Orange / Black / Total Orange – DC0803-808 , giày đá bóng chính hãng Nike Phantom GT 2 Academy, giày Nike Phantom GT thấp cổ, giày Phantom GT cổ truyền thống… sản phẩm hoàn toàn mới, thiết kế trẻ trung và mạnh mẽ, ngoại […]', 1, '', '', '', '2022-07-23 08:44:02', NULL),
(23, 7, 'Puma Future Z 1.2 Pro Cage TF – Green / White / Black – 106498-02', '1658565893-product-3.png', 2600000, 3, 'Puma Future Z 1.2 Pro Cage TF – Green / White / Black – 106498-02', 'Siêu phẩm giày đá bóng Puma Future Z 1.2 Pro Cage TF – Green / White / Black – 106498-02, giày đá bóng cao cấp, giày bóng đá sân cỏ nhân tạo, upper làm từ da tổng hợp kết hợp sợi cực mềm!', 1, '', '', '', '2022-07-23 08:44:53', NULL),
(24, 7, 'Adidas Copa Kapitan .2 TF – Core Black / Gold Metallic – FZ3251', '1658565957-product-4.png', 2200000, 3, 'Adidas Copa', 'Giày bóng đá Adidas Copa Kapitan .2 TF – Core Black / Gold Metallic – FZ3251, giày đá bóng chính hãng, giày sân cỏ nhân tạo, giày bóng đá Adidas Copa, upper làm từ da thật – da bê cực mềm, đế giày kiểu TF phù hợp với sân cỏ nhân tạo…', 1, '', '', '', '2022-07-23 08:45:57', NULL),
(25, 6, 'Adidas Copa Sense .3 MG Meteorite pack- Solar Red/ White/ Red FY6190', '1658566788-product-6.png', 1800000, 5, 'Adidas Copa', 'Giày bóng đá Adidas Copa Sense .3 MG Meteorite pack- Solar Red/ White/ Red FY6190, mã sản phẩm FY6190, nằm trong bộ sưu tập Adidas Meteorite pack, giày đá bóng chính hãng, giày bóng đá Adidas Copa, upper làm từ da thật – da bê cực mềm, đế giày kiểu MG  phù hợp với sân […]', 1, '', '', '', '2022-07-23 08:59:48', NULL),
(26, 8, 'Bóng Adidas Pyrostorm UCL Pro OMB- White/ Solar Red/ Solar Yellow/ Black GU0214', '1658585276-product-1.jpg', 3300000, 10, 'Bóng Adidas', 'Bóng Adidas Pyrostorm UCL Pro OMB- White/ Solar Red/ Solar Yellow/ Black, mã sản phẩm GU0214, bóng Adidas Official Match ball, bóng Adidas chính hãng, bóng Adidas thi đấu chính thức, với cách đặt tên cực kỳ dữ dẵn là Pyrostorm có nghĩa là bão lửa với cách thiết kế hoàn toàn mới. Đây là sản […]', 1, '', '', '', '2022-07-23 14:06:41', '2022-07-23 21:07:56'),
(27, 8, 'Nike Club Elite Team FIFA Quality Pro CU8053-100', '1658585262-product-2.png', 1800000, 10, 'Nike Club', 'Bóng đá Nike Club Elite Team FIFA Quality Pro CU8053-100', 1, '', '', '', '2022-07-23 14:07:42', NULL),
(28, 8, 'Bóng Nike Club Elite FA Cup FIFA Quality Pro DC2378-100', '1658585322-product-3.png', 1800000, 10, 'Bóng Nike', 'Bóng Nike Club Elite FA Cup FIFA Quality Pro DC2378-100, Bóng Nike chính hãng.', 1, '', '', '', '2022-07-23 14:08:42', NULL),
(29, 8, 'Bóng Adidas UCL Pro OMB FIFA Quality Pro 2022-2023 HE3777', '1658585367-product-4.png', 3300000, 10, 'Bóng Adidas', 'Bóng Adidas UCL Pro OMB FIFA Quality Pro 2022-2023 , mã sản phẩm HE3777, bóng Adidas Official Match ball, bóng Adidas chính hãng, bóng Adidas thi đấu chính thức. Đây là sản phẩm cao cấp và đắt tiền nhất, được thi đấu chính thức tại UEFA Champions League mùa giải 2022-2023, sử dụng bắt đầu […]', 1, '', '', '', '2022-07-23 14:09:27', NULL),
(30, 8, 'Bóng Molten F5U3400-12 – Trắng / Cam / Vàng / Đen', '1658585407-product-5.png', 860000, 10, 'Bóng Molten F5U3400-12 – Trắng / Cam / Vàng / Đen', 'Bóng Molten 3400 AFC, mã sản phẩm F5U3400-12, quả bóng chính hãng, bóng Molten chính hãng, da bóng làm từ vật liệu PU chống ma sát và màu mòn bề mặt, bao gồm 32 miếng ghép được ép nhiệt giúp chống nước khi sử dụng trời mưa. Ruột bóng làm từ cao su Butyl cao cấp, […]', 1, '', '', '', '2022-07-23 14:10:07', NULL),
(31, 8, 'Bóng Adidas Conext 21 Ekstraklasa Pro FIFA Quality Pro GU1550', '1658585449-product-6.png', 3200000, 6, 'Bóng Adidas Conext 21 Ekstraklasa Pro FIFA Quality Pro GU1550', 'Bóng Adidas Conext 21 Ekstraklasa Pro FIFA Quality Pro GU1550, mã sản phẩm GU1550, bóng Adidas chính hãng, bóng tiêu chuẩn FIFA Quality Pro, bóng OMB- Official Match Ball – bóng thi đấu chính thức, size 5 tiêu chuẩn …', 1, '', '', '', '2022-07-23 14:10:49', NULL),
(32, 8, 'Bóng Adidas Al Rihla Pro World Cup 2022 OMB H57783', '1658585486-product-7.png', 3300000, 8, 'Bóng Adidas Al Rihla Pro World Cup 2022 OMB H57783', 'Bóng Adidas Al Rihla Pro World Cup 2022 Official Match Ball, mã sản phẩm H57783. Bóng thi đấu chính thức tại vòng chung kết World Cup 2022 tổ chức ở Quatar từ 21/11 tới 18/12 năm nay . Quả bóng World Cup 2022, bóng thi đấu chính thức gọi là Official Match Ball cực đẹp. […]', 1, '', '', '', '2022-07-23 14:11:26', NULL),
(33, 8, 'Bóng Adidas Tiro League TB- White/ Solar Blue FS0376', '1658585522-product-8.jpg', 800000, 6, 'Bóng Adidas Tiro League TB- White/ Solar Blue FS0376', 'Bóng Adidas Tiro League TB- White/ Solar Blue FS0376, bóng Adidas chính hãng, bóng Adidas 2020, quả bóng Adidas chính hãng, thiết kể cực đẹp chắc chắn sẽ nổi bật trên sân, da bóng làm từ da PU 100% êm ái, độ nảy chuẩn. các miếng da bóng được kết nối chắc chắn nhờ công […]', 1, '', '', '', '2022-07-23 14:12:03', '2022-07-23 21:13:20'),
(34, 1, 'Nike Phantom GT II Academy TF – Laser Orange / Black / Total Orange – DC0803-808', '1658643484-product-2.png', 1800000, 10, 'Nike Phantom', 'Giày đá bóng Nike Phantom GT II Academy TF – Laser Orange / Black / Total Orange – DC0803-808 , giày đá bóng chính hãng Nike Phantom GT 2 Academy, giày Nike Phantom GT thấp cổ, giày Phantom GT cổ truyền thống… sản phẩm hoàn toàn mới, thiết kế trẻ trung và mạnh mẽ, ngoại […]', 1, '', '', '', '2022-07-24 06:18:04', NULL),
(35, 1, 'Nike Tiempo Legend 9 Academy FG Motivation pack – White/ Volt/ Bright Crimson DA1174-176', '1658643540-product-3.png', 1800000, 10, 'Nike Tiempo Legend 9 Academy FG Motivation pack – White/ Volt/ Bright Crimson DA1174-176', 'Giày bóng đá Nike Tiempo Legend 9 Academy FG Motivation pack – White/ Volt/ Bright Crimson DA1174-176, giày bóng đá sân cỏ tự nhiên, giày đá bóng chính hãng Nike, upper làm từ da thật- da bê cực mềm, đế giày kiểu FG phù hợp chơi bóng trên sân cỏ tự nhiên!  ', 1, '', '', '', '2022-07-24 06:19:00', NULL),
(36, 1, 'Nike Tiempo Legend 9 Academy TF Bonded pack màu xanh lá mạ cam DA1191-343', '1658645024-product-4.png', 1800000, 10, 'Nike Tiempo Legend 9 Academy TF Bonded pack màu xanh lá mạ cam DA1191-343', 'Giày bóng đá Nike Tiempo Legend 9 Academy TF – Bonded pack màu xanh lá mạ cam DA1191-343 ! Giày đá bóng Nike Tiempo Legend 9 Academy TF chính hãng, một trong những đôi giày Nike Tiempo nhẹ nhất từng được sản xuất nhưng vẫn giữ được mọi ưu điểm của dòng giày đá bóng huyền thoại […]', 1, '', '', '', '2022-07-24 06:19:37', '2022-07-24 13:43:44'),
(37, 1, 'Nike Tiempo Legend 9 Academy AG – Black/ Iron Grey DB0627-004', '1658645008-product-5.png', 1800000, 10, 'Nike Tiempo', 'Giày bóng đá Nike Tiempo Legend 9 Academy AG – Black/ Iron Grey DB0627-004, giày bóng đá phù hợp đã sân cỏ tự nhiên và sân nhân tạo, giày đá bóng chính hãng Nike, upper làm từ da thật- da bê cực mềm, đế giày kiểu AG phù hợp chơi bóng trên sân cỏ tự […]', 1, '', '', '', '2022-07-24 06:21:00', '2022-07-24 13:43:28'),
(38, 1, 'Nike Mercurial Vapor 14 Academy AG- Volt/ Bright Crimson/ Black CV0967-760', '1658643716-product-6.png', 1850000, 10, 'Nike Mercurial', 'Giày đá bóng Nike Mercurial Vapor 14 Academy AG- Volt/ Bright Crimson/ Black CV0967-760, giày bóng đá Nike chính hãng, giày bóng đá sân cỏ nhân tạo, đế giày kiểu AG phù hợp chơi bóng trên sân cỏ nhân tạo, upper làm từ da tổng hợp mềm, mỗi một thế hệ lại những yếu tố […]', 1, '', '', '', '2022-07-24 06:21:56', NULL),
(39, 1, 'Nike Tiempo Legend 9 Academy TF- màu đen đồng DA1191-007', '1658643758-product-7.png', 1850000, 10, 'Nike Tiempo', 'Giày bóng đá Nike Tiempo Legend 9 Academy TF – màu đen đồng DA1191-007! Giày đá bóng Nike Tiempo Legend 9 Academy TF chính hãng, một trong những đôi giày Nike Tiempo nhẹ nhất từng được sản xuất nhưng vẫn giữ được mọi ưu điểm của dòng giày đá bóng huyền thoại này. Model Nike Tiempo 9 […]', 1, '', '', '', '2022-07-24 06:22:38', NULL),
(40, 1, 'Nike Phantom GT II Academy TF màu đen DC0803-004', '1658643793-product-8.png', 1550000, 0, 'Nike Phantom', 'Giày đá bóng Nike Phantom GT II Academy TF màu đen DC0803-004 , giày đá bóng chính hãng Nike Phantom GT 2 Academy, giày Nike Phantom GT thấp cổ, giày Phantom GT cổ truyền thống… sản phẩm hoàn toàn mới, thiết kế trẻ trung và mạnh mẽ, ngoại thất cực đẹp… dòng giày Nike Phantom […]', 1, '', '', '', '2022-07-24 06:23:13', NULL),
(41, 1, 'Nike Tiempo Legend 9 Academy FG – Black/ Iron Grey DA1174-004', '1658643837-product-9.png', 1850000, 6, 'Nike Tiempo Legend 9 Academy FG – Black/ Iron Grey DA1174-004', 'Giày bóng đá Nike Tiempo Legend 9 Academy FG – Black/ Iron Grey DA1174-004, giày bóng đá sân cỏ tự nhiên, giày đá bóng chính hãng Nike, upper làm từ da thật- da bê cực mềm, đế giày kiểu FG phù hợp chơi bóng trên sân cỏ tự nhiên!', 1, '', '', '', '2022-07-24 06:23:57', NULL),
(42, 1, 'Nike Tiempo Legend 9 Academy AG Motivation pack DB0627-176 màu trắng đỏ', '1658643883-product-10.png', 1800000, 6, 'Nike Tiempo', 'Giày bóng đá Nike Tiempo Legend 9 Academy AG Motivation pack DB0627-176 màu trắng đỏ, giày bóng đá phù hợp đã sân cỏ tự nhiên và sân nhân tạo, giày đá bóng chính hãng Nike, upper làm từ da thật- da bê cực mềm, đế giày kiểu AG phù hợp chơi bóng trên sân cỏ […]', 1, '', '', '', '2022-07-24 06:24:43', NULL),
(43, 1, 'Nike Tiempo Legend 9 Academy TF – White/ Dark Smoke Grey /Black DA1191-107', '1658643918-product-11.png', 1850000, 7, 'Nike Tiempo', 'Giày bóng đá Nike Tiempo Legend 9 Academy TF – White/ Dark Smoke Grey /Black DA1191-107! Giày đá bóng Nike Tiempo Legend 9 Academy TF chính hãng, một trong những đôi giày Nike Tiempo nhẹ nhất từng được sản xuất nhưng vẫn giữ được mọi ưu điểm của dòng giày đá bóng huyền thoại này. Model Nike […]', 1, '', '', '', '2022-07-24 06:25:18', NULL),
(44, 1, 'Nike Mercurial Vapor 14 Club TF- Volt/ Bright Crimson/ Black CV0985-760', '1658644909-product-12.png', 1400000, 6, 'Nike Mercurial', 'Giày đá bóng Nike Mercurial Vapor 14 Club TF- Volt/ Bright Crimson/ Black CV0985-760, giày đá bóng chính hãng, upper làm từ da tổng hợp, giày đá bóng đế TF đá sân cỏ nhân tạo. ', 1, '', '', '', '2022-07-24 06:26:11', '2022-07-24 13:41:49'),
(45, 1, 'Nike Tiempo Legend 9 Academy TF- Grey/ Blue DA1191-054', '1658644035-product-13.png', 1850000, 8, 'Nike Tiempo Legend 9 Academy TF- Grey/ Blue DA1191-054', 'Giày bóng đá Nike Tiempo Legend 9 Academy TF- Grey/ Blue DA1191-054! Giày đá bóng Nike Tiempo Legend 9 Academy TF chính hãng, một trong những đôi giày Nike Tiempo nhẹ nhất từng được sản xuất nhưng vẫn giữ được mọi ưu điểm của dòng giày đá bóng huyền thoại này. Model Nike Tiempo 9 mang […]', 1, '', '', '', '2022-07-24 06:27:15', NULL),
(46, 1, 'Nike Tiempo Legend 9 Pro TF- Light Photo Blue/ Black/ Lime Glow DA1192-403', '1658644079-product-14.png', 2590000, 6, 'Nike Tiempo', 'Giày đá bóng Nike Tiempo Legend 9 Pro TF – Light Photo Blue/ Black/ Lime Glow DA1192-403, giày đá bóng chính hãng Nike, giày Nike Tiempo 9 Pro TF thế hệ mới nhất, đây là phân khúc cao cấp nhất dành cho sân cỏ nhân tạo, đây là mẫu giày Nike Tiempo nhẹ nhất trong […]', 1, '', '', '', '2022-07-24 06:27:59', NULL),
(47, 1, 'Nike Mercurial Vapor 14 Pro TF Recharge pack- Sapphire/ Volt/ Blue Void CV1001-574', '1658644125-product-15.png', 2650000, 10, 'Nike Mercurial', 'Giày đá bóng chính hãng Nike Mercurial Vapor 14 Pro TF Recharge pack- Sapphire/ Volt/ Blue Void CV1001-574, mã sản phẩm CV1001-574, model giày bóng đá Nike Mercurial Vapor 14 Pro mới nhất,  nằm trong bộ sưu tập Nike Recharge cực đẹp mang phong cách xanh saphire, đây là colorway cực đẹp với màu vàng […]', 1, '', '', '', '2022-07-24 06:28:45', NULL),
(48, 1, 'Nike Mercurial Superfly VII Academy TF- Laser Crimson/ Black AT7978-606', '1658644161-product-16.jpg', 1750000, 10, 'Nike Mercurial Superfly VII Academy TF- Laser Crimson/ Black AT7978-606', 'Giày đá bóng Nike Mercurial Superfly VII Academy TF- Laser Crimson/ Black AT7978-606, giày đá bóng sân cỏ nhân tạo, giày đá bóng Nike chính hãng, Nike cao cổ, Phiên bản giày bóng đá Nike cao cổ, giày Nike cao cổ, Nike Mercurial Superfly Academy là một cuộc cách mạng trong thiết kế và cải […]', 1, '', '', '', '2022-07-24 06:29:21', NULL),
(49, 1, 'Nike Mercurial Vapor 14 Academy TF – Black / Metallic Gold / Metallic Silver – DJ2879-007', '1658644209-product-17.png', 1950000, 16, 'Nike Mercurial Vapor 14 Academy TF – Black / Metallic Gold / Metallic Silver – DJ2879-007', 'Giày đá bóng Nike Mercurial Vapor Academy TF – Black / Metallic Gold / Metallic Silver – DJ2879-007, mã sản phẩm DJ2879-007, giày đá bóng chính hãng Nike Mercurial Vapor 14 Academy TF mới nhất, dòng sản phẩm mới ra mắt 2021 và nâng cấp năm 2022, , model giày Nike Mercurial Vapor 14 mới, […]', 1, '', '', '', '2022-07-24 06:30:09', NULL),
(50, 1, 'Nike Mercurial Vapor 14 Elite FG – Recharge Sapphire / Volt / Blue Void – CQ7635-574', '1658644254-product-18.png', 4500000, 3, 'Nike Mercurial', 'Giày bóng đá Nike Mercurial Vapor 14 Elite FG – Recharge Sapphire / Volt / Blue Void – CQ7635-574, giày bóng đá Nike được yêu thích nhất trên thế giới, sản phẩm lên chân nhiều cầu thủ chuyên nghiệp nhất và ghi nhiều bàn thắng nhất tại các giải bóng đá hàng đầu thế giới, mang […]', 1, '', '', '', '2022-07-24 06:30:54', NULL),
(51, 1, 'Nike Tiempo Legend 9 Pro TF – Team Red / Bright Crimson / White – DA1192-616', '1658644307-product-19.png', 2800000, 6, 'Nike Tiempo', 'Giày đá bóng Nike Tiempo Legend 9 Pro TF – Team Red / Bright Crimson / White – DA1192-616, giày đá bóng chính hãng Nike, giày Nike Tiempo 9 Pro TF thế hệ mới nhất, đây là phân khúc cao cấp nhất dành cho sân cỏ nhân tạo, đây là mẫu giày Nike Tiempo nhẹ nhất […]', 1, '', '', '', '2022-07-24 06:31:47', NULL),
(52, 1, 'Nike Tiempo Legend 9 Academy TF – Team Red / Bright Crimson / White – DA1191-616', '1658644355-product-20.png', 1850000, 12, 'Nike Tiempo\r\n', 'Giày bóng đá Nike Tiempo Legend 9 Academy TF – Team Red / Bright Crimson / White – DA1191-616 ! Giày đá bóng Nike Tiempo Legend 9 Academy TF chính hãng, một trong những đôi giày Nike Tiempo nhẹ nhất từng được sản xuất nhưng vẫn giữ được mọi ưu điểm của dòng giày đá […]', 1, '', '', '', '2022-07-24 06:32:35', NULL),
(53, 1, 'Nike Tiempo Legend 8 Academy FG/Mg -Aquamarine / White / Lime Glow – AT5292-303', '1658644398-product-21.png', 1800000, 12, 'Nike Tiempo Legend 8 Academy FG/Mg -Aquamarine / White / Lime Glow – AT5292-303', 'Giày bóng đá Nike Tiempo Legend 8 Academy FG/Mg -Aquamarine / White / Lime Glow – AT5292-303, giày bóng đá sân cỏ tự nhiên, giày đá bóng chính hãng Nike, upper làm từ da thật- da bê cực mềm, đế giày kiểu FG phù hợp chơi bóng trên sân cỏ tự nhiên!', 1, '', '', '', '2022-07-24 06:33:18', NULL),
(54, 1, ' Nike Mercurial Vapor 14 Club TF- Black/ Cyber/ Off Noir CV0985-090', '1658644843-product-22.png', 1300000, 12, 'Nike Mercurial', 'Giày đá bóng Nike Mercurial Vapor 14 Club TF- Black/ Cyber/ Off Noir CV0985-090, giày đá bóng chính hãng, upper làm từ da tổng hợp, giày đá bóng đế TF đá sân cỏ nhân tạo.', 1, '', '', '', '2022-07-24 06:34:19', '2022-07-24 13:40:43'),
(55, 1, 'Nike Mercurial Vapor 14 Club FG- Black/ Cyber/ Off Noir CU5692-090', '1658644499-product-23.png', 1300000, 12, 'Nike Mercurial', 'Giày đá bóng Nike Mercurial Vapor 14 Club FG- Black/ Cyber/ Off Noir CU5692-090, giày đá bóng chính hãng, upper làm từ da tổng hợp, giày đá bóng đế FG đá sân cỏ tự nhiên.', 1, '', '', '', '2022-07-24 06:34:59', NULL),
(56, 1, 'Nike Mercurial Vapor 14 Club TF Spectrum- Bright Crimson/Metallic Silver CV0985-600', '1658644562-product-24.png', 1350000, 12, 'Nike Mercurial', 'Giày đá bóng Nike Mercurial Vapor 14 Club TF Spectrum- Bright Crimson/Metallic Silver CV0985-600, giày đá bóng chính hãng, upper làm từ da tổng hợp, giày đá bóng đế TF đá sân cỏ nhân tạo.', 1, '', '', '', '2022-07-24 06:36:02', NULL),
(57, 1, 'Nike Mercurial Vapor 14 Academy TF Progress pack – Football Grey / Dark Marina Blue – DJ2879-054', '1658644615-product-25.png', 1890000, 12, 'Nike Mercurial', 'Giày đá bóng Nike Mercurial Vapor 14 Academy TF Progress pack – Football Grey / Dark Marina Blue – DJ2879-054, nằm trong bộ sưu tập Nike Progress pack cực đẹp, giày đá bóng chính hãng Nike Mercurial Vapor 14 Academy TF mới nhất, dòng sản phẩm mới ra mắt 2021 và nâng cấp năm 2022, […]', 1, '', '', '', '2022-07-24 06:36:55', NULL),
(58, 1, 'Nike Mercurial Superfly 8 Academy TF Progress pack- Football Grey/ Blackened Blue DJ2878-054', '1658644662-product-26.png', 2300000, 8, 'Nike Mercurial', 'Giày Nike Mercurial Superfly 8 Academy TF Progress pack- Football Grey/ Blackened Blue DJ2878-054, mã sản phẩmDJ2878-054, nằm trong bộ sưu tập giày Nike Mercurial Progress pack- chỉ xuất hiện duy nhất trên dòng Mercurial , giày Nike cao cổ, giày Nike Superfly 8 TF, sản phẩm Nike Mercurial Superfly 8 Academy mới nhất, dòng […]', 1, '', '', '', '2022-07-24 06:37:42', NULL),
(59, 1, 'Nike Tiempo Legend VIII Club TF – Laser Crimson/ Black/ White – AT6109-606', '1658644707-product-27.jpg', 1100000, 15, 'Nike Tiempo', 'Giày đá bóng Nike Tiempo Legend VIII Club TF – Laser Crimson/ Black/ White AT6109-606, giày đá bóng sân cỏ nhân tạo, giày đá bóng Nike chính hãng, giày đá bóng Nike Tiempo 8, giày Nike Tiempo Legend 8, giày đá bóng sân cỏ nhân tạo cực đẹp của Nike, upper làm từ da tổng […]', 1, '', '', '', '2022-07-24 06:38:27', NULL),
(60, 1, 'Nike Mercurial Vapor 14 Academy TF Blue Print pack – Chlorine Blue/ Laser Orange/ Marina DJ2879-484', '1658644746-product-28.png', 1890000, 10, 'Nike Mercurial', 'Giày đá bóng Nike Mercurial Vapor 14 Academy TF Blue Print pack – Chlorine Blue/ Laser Orange/ Marina, mã sản phẩm DJ2879-484, nằm trong bộ sưu tập Nike Blue Print cực đẹp, giày đá bóng chính hãng Nike Mercurial Vapor 14 Academy TF mới nhất, dòng sản phẩm mới ra mắt 2021 và nâng cấp […]', 1, '', '', '', '2022-07-24 06:39:06', NULL),
(61, 8, 'Bóng Nike Flight Premier League 2021- 2022 OMB EPL DC2209-710', '1658848960-product-9.png', 3700000, 10, 'Bóng Nike', 'Bóng Nike Flight Premier League 2021-2022 OMB , mã sản phẩm DC2209-710, bóng thi đấu chính thức tại giải bóng đá Ngoại Hạng Anh mùa giải 2021 – 2022 , bóng Nike Flight Official Match Ball, bóng Nike chính hãng. Đây là quả bóng thế hệ mới, được thiết kế lại giúp tăng độ chính […]', 1, '', '', '', '2022-07-25 02:09:04', '2022-07-26 22:22:40'),
(62, 2, 'Adidas Predator Edge .3 L FG Game Data pack- Solar Red/ Team Solar Green/ Black GW0994', '1658903168-product-3.png', 1999000, 7, 'Adidas Predator', 'Adidas Predator Edge .3 L FG Game Data pack- Solar Red/ Team Solar Green/ Black GW0994, giày Adidas chính hãng, nằm trong bộ sưu tập giày Adidas Game Data pack, giày đá bóng Adidas Predator Edge… Model giày đá bóng Adidas mới nhất hướng tới một siêu giày kiểm soát bóng tối ưu, thiết kế cực […]', 1, '', '', '', '2022-07-27 06:26:08', NULL),
(63, 2, 'Adidas X Speedportal .4 TF Game Data pack GW8507 màu xanh lá', '1658903224-product-4.png', 1400000, 6, 'Adidas X', 'Adidas X Speedportal .4 TF Game Data pack GW8507 màu xanh lá, mã sản phẩm GW8507, màu xanh lá cực đẹp, nằm trong bộ sưu tập giày Adidas Game Data pack, giày bóng đá sân cỏ nhân tạo, giày bóng đá Adidas chính hãng, upper làm từ da tổng hợp, đế giày kiểu TF phù […]', 1, '', '', '', '2022-07-27 06:27:04', NULL),
(64, 2, 'Adidas X SpeedFlow .4 TF Messi – Victory Blue/ Shock Pink/ Solar Yellow FY6918', '1658903262-product-5.png', 1300000, 7, 'Adidas X SpeedFlow .4 TF Messi – Victory Blue/ Shock Pink/ Solar Yellow FY6918', 'Giày bóng đá Adidas X SpeedFlow .4 TF Messi – Victory Blue/ Shock Pink/ Solar Yellow FY6918, mã sản phẩm FY6918, phối màu độc lạ duy nhất dành cho Messi, ký hiệu 100 ám chỉ chỉ số vượt trội mà không cầu thủ nào với tới được, giày bóng đá Adidas chính hãng, X Speedflow […]', 1, '', '', '', '2022-07-27 06:27:42', NULL),
(65, 2, 'Adidas X SpeedFlow .1 FG Numbers Up pack – Clear Onix/ White/ Solar Yellow FY6866', '1658903323-product-6.png', 3900000, 8, 'Adidas X', 'Siêu phẩm giày Adidas X SpeedFlow .1 FG Numbers Up pack – Clear Onix/ White/ Solar Yellow , mã sản phẩm FY6866, phân khúc siêu cao cấp, trọng lượng siêu nhẹ với khoảng 200 gram/chiếc, nằm trong bộ sưu tập Numbers Up pack 2021. upper làm từ sợi kết hợp da tổng siêu mỏng và siêu […]', 1, '', '', '', '2022-07-27 06:28:43', NULL),
(66, 2, 'Adidas X SpeedFlow .1 FG Messi – Victory Blue/ Shock Pink/ Solar Yellow FY6879', '1658903368-product-7.png', 3900000, 10, 'Adidas X SpeedFlow .1 FG Messi – Victory Blue/ Shock Pink/ Solar Yellow FY6879', 'Siêu phẩm giày Adidas X SpeedFlow .1 FG Messi – Victory Blue/ Shock Pink/ Solar Yellow , mã sản phẩm FY6879, phân khúc siêu cao cấp, trọng lượng siêu nhẹ với khoảng 200 gram/chiếc, upper làm từ sợi kết hợp da tổng siêu mỏng và siêu mềm,  đế FG dành cho sân cỏ tự nhiên ! […]', 1, '', '', '', '2022-07-27 06:29:28', NULL),
(67, 1, 'Adidas X SpeedFlow .3 TF Numbers Up FY3311', '1658903649-product-8.png', 1800000, 3, 'Adidas X SpeedFlow .3 TF Numbers Up FY3311', 'Giày đá bóng Adidas X SpeedFlow .3 TF – Numbers Up FY3311, mã sản phẩm FY3311,giày đá bóng Adidas chính hãng, nằm trong thế hệ mới nhất Adidas SpeedFlow- dòng giày tốc độ đỉnh cao, được thiết kế lại nhằm giảm trọng lượng và tăng độ êm ái, upper giày sử dụng vật liêu sợi  […]', 1, '', '', '', '2022-07-27 06:30:04', '2022-07-27 13:34:09'),
(68, 2, 'Adidas Copa Sense .3 MG Meteorite pack- Solar Red/ White/ Red FY6190', '1658903445-product-9.png', 1800000, 4, 'Adidas Copa', 'Giày bóng đá Adidas Copa Sense .3 MG Meteorite pack- Solar Red/ White/ Red FY6190, mã sản phẩm FY6190, nằm trong bộ sưu tập Adidas Meteorite pack, giày đá bóng chính hãng, giày bóng đá Adidas Copa, upper làm từ da thật – da bê cực mềm, đế giày kiểu MG  phù hợp với sân […]', 1, '', '', '', '2022-07-27 06:30:45', NULL),
(69, 2, 'Adidas Predator Edge .3 L TF Diamond Edge pack- White/ Hi-res Blue GX2633', '1658903498-product-10.png', 1900000, 6, 'Adidas Predator', 'Giày bóng đá Adidas Predator Edge .3 L TF Diamond Edge pack- White/ Hi-res Blue GX2633, mã sản phẩm GX2633, model mới nhất đã cập bến, một sản phẩm tuyệt vời cho những tiền vệ, nhưng bộ não của đội bóng, cho những người làm chủ cuộc chơi. Predator Edge là thế hệ sản phẩm […]', 1, '', '', '', '2022-07-27 06:31:38', NULL),
(70, 2, 'Adidas X Speedflow .1 TF Messi Mi Historia- Solar Gold/ Core Black/ Bright Yellow GW3864', '1658903630-product-11.png', 3000000, 6, 'Adidas X', 'Giày bóng đá Adidas X SpeedFlow .1 TF Messi Mi Historia- Solar Gold/ Core Black/ Bright Yellow, mã sản phẩm GW3864, nằm trong loạt sản phẩm độc quyền dành riêng cho siêu sao Messi gọi là Mi Historia – My History : lịch sử của tôi, đây là siêu phẩm cao cấp nhất dành cho […]', 1, '', '', '', '2022-07-27 06:32:18', '2022-07-27 13:33:50'),
(71, 2, 'Adidas Nemeziz .4 TF- Team Royal Blue/ Solar Yellow/ Core Black FW7405', '1658903615-product-12.jpg', 1200000, 4, 'Adidas Nemeziz .4 TF- Team Royal Blue/ Solar Yellow/ Core Black FW7405', 'Giày đá bóng Adidas Nemeziz .4 TF- Team Royal Blue/ Solar Yellow/ Core Black, mã sản phẩm: FW7405, giày đá bóng chính hãng, giày đá bóng sân cỏ nhân tạo, giày đá bóng Adidas chính hãng, giày đá bóng Adidas Nemeziz .4 TF, đế TF đá trên sân cỏ nhân tạo, upper làm từ da […]', 1, '', '', '', '2022-07-27 06:33:17', '2022-07-27 13:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL COMMENT 'Tên đăng nhập',
  `password` varchar(255) DEFAULT NULL COMMENT 'Mật khẩu đăng nhập',
  `first_name` varchar(255) DEFAULT NULL COMMENT 'Fist name',
  `last_name` varchar(255) DEFAULT NULL COMMENT 'Last name',
  `phone` int(11) DEFAULT NULL COMMENT 'SĐT user',
  `address` varchar(255) DEFAULT NULL COMMENT 'Địa chỉ user',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email của user',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'File ảnh đại diện',
  `jobs` varchar(255) DEFAULT NULL COMMENT 'Nghề nghiệp',
  `last_login` datetime DEFAULT NULL COMMENT 'Lần đăng nhập gần đây nhất',
  `facebook` varchar(255) DEFAULT NULL COMMENT 'Link facebook',
  `status` tinyint(3) DEFAULT '0' COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `phone`, `address`, `email`, `avatar`, `jobs`, `last_login`, `facebook`, `status`, `created_at`, `updated_at`) VALUES
(1, 'anh', '$2y$10$WlaiEZq9fJtUQVM3/Lsziu643d1KyYvRk10iBEm6oXIGG07.n/ice', 'Trần Ngọc', 'Ánh', 942267355, 'Nam Định', 'anh16102002tran@gmail.com', '1658562124-user-png.jpg', '', NULL, '', 1, '2022-07-23 07:40:00', NULL),
(4, 'admin', '$2y$10$r/VIfh2KAHVJuOlIOXjFleda7ynFusN0g5AMi.Ql..gL9XCrztMI2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-07-24 08:43:43', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
