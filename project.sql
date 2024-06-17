
DROP DATABASE if exists `radios`;

CREATE DATABASE `radios` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
use radios;

Create table categories
(
    id int primary key auto_increment,
    name varchar(100) NOT NULL unique,
    status tinyint(1) default '1'
);

Create table products
(
    id int primary key auto_increment,
    name varchar(100) NOT NULL unique,
    status tinyint(1) default '1',
    price float NOT NULL,
    sale float default '0',
    image varchar(100) NOT NULL,
    quantity int null,
    sold int null,
    descriptions text NULL,
    category_id int NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

Create table admins
(
    id int primary key auto_increment,
    name varchar(100) NOT NULL,
    email varchar(100) NOT NULL unique,
    password varchar(100) NOT NULL,
    avatar varchar(100) ,
    last_login date default NOW()
);

Create table customers
(
    id int primary key auto_increment,
    name varchar(100) NOT NULL,
    email varchar(100) NOT NULL unique,
    phone varchar(23) NOT NULL unique,
    address varchar(255) Not NULL,
    gender tinyint(1) default '1',
    birthday date NOT NULL,
    password varchar(100) NOT NULL,
    avatar varchar(100) NULL,
    last_login date default NOW()
);


Create table orders
(
    id int primary key auto_increment,
    name varchar(100) NOT NULL,
    email varchar(100) NOT NULL,
    phone varchar(23) NOT NULL,
    address varchar(255) NULL,
    order_date date default NOW(),
    status tinyint(1) default '1',
    order_note varchar(255) NOT NULL,
    customer_id int NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES customers(id)
);

Create table order_details
(
    order_id int NOT NULL,
    product_id int NOT NULL,
    quantity int NOT NULL,
    price float NOT NULL,
    primary key (order_id, product_id),
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

Create table ratings
(
    customer_id int NOT NULL,
    product_id int NOT NULL,
    start float NOT NULL,
    comments text NOT NULL,
    rating_date date default NOW(),
    status tinyint(1) default '0',
    primary key (customer_id, product_id),
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);
insert into admins(name,email,password,avatar) values
('Mỵ Duy Nguyên','2245n123@gmail.com','Nguyen123','duynguyen.jpg'),
('Bùi Long Quân','fanvip.1st@gmail.com','16272029','quanlavie.jpg'),
('Bùi Trọng Nghĩa','Nghbui159@gmail.com','Nghiadepchai137','nghiabui.jpg');
insert into customers(name,email,phone,password,avatar) values
('User 1','user1@gmail.com','0929384798','123456','avatar.png'),
('User 2','user2@gmail.com','0929234479','123456','avatar1.png'),
('User 3','user3@gmail.com','0929354798','123456','avatar2.png');
insert into categories(name) values ('Laptop'),('Camera'),('Thết bị gia đình'),('Tivi'),('Máy in'),('Phụ kiện'); 
insert into products(name,price,sale,image,quantity,sold,descriptions,category_id) values
('Camera IP 360 Độ 2MP TIANDY TC-H322N',39,50,'cam1.jpg',250,50,'Camera IP 360 Độ 2MP TIANDY TC-H322N là một sản phẩm camera thông minh với khả năng quan sát toàn cảnh không gian trong nhà cùng độ phân giải cao và nhiều tính năng tiện ích khác, hứa hẹn đây sẽ là trợ thủ đắc lực giúp bạn bảo vệ cho ngôi nhà của mình',2),
('Camera IP 360 Độ 2MP TP-Link Tapo TC70 ',43,50,'cam2.jpg',250,50,'TP-Link Tapo TC70 giúp người sử dụng nắm bắt tốt mọi diễn biến xung quanh khu vực quan sát, góc quan sát rộng mang đến dữ liệu quan sát giá trị, đồng thời giảm đầu tư cho việc lắp đặt nhiều camera trong 1 khu vực cần giám sát.',2),
('Camera IP 360 Độ 2MP IMOU Ranger 2C A22EP-L',45,50,'cam3.jpg',250,50,'Camera IP 360 Độ 2MP IMOU Ranger 2C A22EP-L với kiểu dáng nhỏ nhắn, chân đế bằng phẳng giúp dễ dàng đặt trên bàn hay lắp trên các mặt phẳng, camera hỗ trợ ghi lại bao quát không gian xung quanh với độ sắc nét cao, hứa hẹn mang đến người dùng những trải nghiệm tốt nhất',2),
('Camera IP 360 Độ 2MP Ezviz C6N',39,50,'cam4.jpg',250,50,'Camera IP 360 Độ 2MP Ezviz C6N có kích cỡ nhỏ nhắn, cầm nắm thoải mái chỉ bằng 1 bàn tay, cho bạn dễ dàng trong việc di chuyển, bố trí trong không gian cần sử dụng camera',2),
('Camera IP Ngoài Trời 360 Độ 3MP TIANDY TC-H333N ',75,50,'cam5.jpg',250,50,'Camera IP Ngoài Trời 360 Độ 3MP TIANDY TC-H333N là sản phẩm camera an ninh thông minh với nhiều tính năng nổi bật như báo động âm thanh, gửi thông báo đến điện thoại, phát hiện theo dõi người khi có chuyển động,... giúp bảo vệ an toàn không gian sống cho người dùng',2),
('Camera IP Ngoài Trời 2MP IMOU Bullet 2C F22P',79,50,'cam6.jpg',250,50,'Camera IP Ngoài Trời 2MP IMOU Bullet 2C F22P là 1 thiết bị giám sát an ninh ngoài trời với khả năng quan sát rộng, trang bị các tiện ích theo dõi và khả năng chống nước kháng bụi chuẩn IP67, hỗ trợ bạn bảo vệ ngôi nhà thân yêu.',2),
('Camera IP Ngoài Trời 360 độ 4MP EZVIZ H8C',99,50,'cam7.jpg',250,50,'Camera IP Ngoài Trời 360 độ 4MP EZVIZ H8C sở hữu kiểu dáng đẹp mắt, thiết kế hiện đại cùng nhiều tính năng tích hợp như đèn chớp và còi báo động, theo dõi chuyển động, tự động thu phóng, tích hợp thông minh với Google Assistant và Amazon Alexa,... hứa hẹn mang lại trải nghiệm tốt nhất cho người dùng.',2),
('Camera IP 360 Độ 3MP TP-Link Tapo C211',55,50,'cam8.jpg',250,50,'Camera IP 360 Độ 3MP TP-Link Tapo C211 là camera wifi an ninh gia đình với nhiều tính năng AI được tích hợp, chất lượng hình ảnh sắc nét, đặc biệt với khả năng phát hiện tiếng em bé khóc hỗ trợ bạn chăm sóc trẻ nhỏ cả ngày lẫn đêm.',2),
('Camera IP 360 Độ 5MP BOTSLAB C221',129,50,'cam9.jpg',250,50,'Camera IP 360 Độ 5MP BOTSLAB C221 có kích thước gọn nhẹ, màu sắc trang nhã, khả năng nhìn ngang 360 độ cùng nhiều tính năng AI thông minh đi kèm như phát hiện tiếng khóc, nhận dạng con người, phát hiện thú cưng, thông báo xâm nhập,... đây chắc hẳn là món phụ kiện được nhiều người lựa chọn.',2),
('Camera IP Ngoài Trời 360 Độ 2MP TP-Link Tapo C500p',79,50,'cam10.jpg',250,50,'Camera IP Ngoài Trời 360 Độ 2MP TP-Link Tapo C500 sở hữu thiết kế gọn nhẹ, khả năng quan sát rộng, độ phân giải cao, lưu trữ dữ liệu lớn, cùng nhiều tính năng tích hợp khác, đáp ứng tốt nhu cầu giám sát hàng ngày của người dùng.',2),

('Máy giặt Toshiba 8 kg AW-M905BV(MK)',499,50,'home1.jpg',250,50,'Máy giặt Toshiba 8kg AW-M905BV(MK) thuộc kiểu máy giặt cửa trên – lồng đứng sang trọng, giặt sạch quần áo và giảm thiểu hư tổn sợi vải với lồng giặt ngôi sao pha lê, tự động kiểm tra lượng đồ giặt và cân chỉnh mức nước nhờ công nghệ suy luận ảo Fuzzy Logic.',3),
('Máy giặt Panasonic 8.2 kg NA-F82Y01DRV',499,50,'home2.jpg',250,50,'Máy giặt Panasonic 8.2 kg NA-F82Y01DRV thuộc dòng máy giặt cửa trên có thiết kế thanh lịch và hiện đại. Tích hợp đa dạng các công nghệ như hệ thống ActiveFoam đánh bay vết bẩn cứng đầu, giặt siêu sạch tăng khả năng loại bỏ vết bẩn.',3),
('Máy giặt Samsung Inverter 12 kg WA12CG5745BVSV',889,50,'home3.jpg',250,50,'Máy giặt Samsung Inverter 12 kg WA12CG5745BVSV có khả năng đánh bay vết bẩn cứng đầu hiệu quả nhờ công nghệ giặt bong bóng siêu mịn Eco Bubble, công nghệ Digital Inverter tiết kiệm điện năng, vận hành êm ái, giặt sạch siêu tốc 29 phút đảm bảo hiệu quả sạch sâu',3),
('Máy giặt Samsung Inverter 9 kg WW90T3040WW/SV',649,50,'home4.jpg',250,50,'Máy giặt Samsung Inverter 9 kg WW90T3040WW/SV tích hợp công nghệ giặt nước nóng Hot Wash giúp dễ dàng đánh bay các vết bẩn cứng đầu khó loại bỏ, đồng thời giúp diệt khuẩn, ngừa dị ứng, cùng các tiện ích đi kèm khác.',3),
('Lò vi sóng Toshiba MWP-MM20P(BK) 20 lít',135,50,'home5.jpg',250,50,'Lò vi sóng Toshiba MWP-MM20P(BK) 20 lít công suất 700W mạnh mẽ, trang bị chuông báo sau khi nấu xong, tiện lợi với chức năng rã đông, hâm nóng,...',3),
('Lò vi sóng có nướng Electrolux EMG23K22B 23 lít',255.5,50,'home6.jpg',250,50,'Lò vi sóng có nướng Electrolux EMG23K22B 23 lít hỗ trợ người dùng rã đông, hâm nóng, nấu, nướng tiện lợi với công suất vi sóng 800W và nướng 1000W. Lò phù hợp với nhiều đối tượng người dùng nhờ thao tác điều chỉnh đơn giản bằng bảng điều khiển nút vặn có chú thích tiếng Việt - Anh.',3),
('Máy lạnh Midea Inverter 1 HP MAFA-09CDN8',499,50,'home7.jpg',250,50,'Máy lạnh Midea Inverter 1 HP MAFA-09CDN8 tăng tốc độ làm mát hiệu quả với công nghệ Fast Cooling, hoạt động êm ái, giảm tiêu hao điện năng nhờ công nghệ iEco, giữ không gian trong lành với bộ lọc 2 lớp HD.',3),
('Máy lọc nước RO nóng nguội lạnh Karofi KAD-X39 10 lõi',719,50,'home8.jpg',250,50,'Máy lọc nước RO nóng lạnh Karofi KAD-X39 10 lõi có 3 chế độ nước nóng - nguội - lạnh, màng lọc RO 100 GPD cho công suất lọc lớn, tạo nước Hydrogen chống oxy hóa, thương hiệu Karofi - Việt Nam.',3),
('Bếp hồng ngoại Sunhouse SHD 6005(EMC)',69,50,'home9.jpg',250,50,'Mặt bếp hồng ngoại bằng kính chịu nhiệt sáng bóng, nhẵn mịn, tiện vệ sinh',3),
('Quạt đứng Senko 3 cánh DH1600 47W',52,50,'home10.jpg',250,50,'Quạt đứng Senko DH1600 với mẫu mã đẹp mắt, màu sắc hài hòa, công suất 47W làm mát nhanh, thay đổi chiều cao linh hoạt, hoạt động bền bỉ với motor bạc thau',3),

('Laptop Asus Vivobook Go 15 E1504FA R5 7520U/16GB/512GB/Chuột/Win11 (NJ776W)',1249,50,'lap1.jpg',250,50,'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.',1),
('Laptop Acer Gaming Aspire 5 A515 58GM 51LB i5 13420H/16GB/512GB/4GB RTX2050/Win11',1669,50,'lap2.jpg',250,50,'Mẫu laptop gaming với mức giá tầm trung đến từ thương hiệu Acer vừa được lên kệ tại Thế Giới Di Động, sở hữu hiệu năng mạnh mẽ với con chip Intel Gen 13 dòng H hiệu năng cao, RAM 16 GB, card rời RTX cùng nhiều tính năng hiện đại. Laptop Acer Aspire 5 Gaming A515 58GM 51LB i5 13420H (NX.KQ4SV.002) chắc chắn sẽ mang đến cho bạn những trải nghiệm sử dụng và chiến game giải trí tuyệt vời.',1),
('Laptop Acer Gaming Nitro 5 Tiger AN515 58 769J i7 12700H/8GB/512GB/4GB RTX3050/144Hz/Win11',2199,50,'lap3.jpg',250,50,'Trải nghiệm giải trí đỉnh cao nhờ hiệu năng từ con chip Intel Core i7 dòng H series hiệu năng cao cùng ngoại hình độc đáo, laptop Acer Gaming Nitro 5 AN515 58 769J i7 12700H (NH.QFHSV.003) chắc chắn sẽ trở thành trợ thủ đắc lực cho người dùng trong những chiến trường ảo đầy kịch tính hay những tác vụ văn phòng và đồ hoạ chuyên nghiệp.',1),
('Laptop MSI Gaming GF63 Thin 12UCX i5 12450H/16GB/512GB/4GB RTX2050/144Hz/Win11',1699,50,'lap4.jpg',250,50,'Mẫu laptop Gaming "quốc dân" sở hữu mức giá thân thiện phù hợp với mọi game thủ, mang trong mình hiệu suất mạnh mẽ vượt trội cùng đa dạng các tính năng sử dụng. Laptop MSI Gaming GF63 Thin 12UCX i5 12450H (873VN) chắc chắn là sự lựa chọn tuyệt vời cho những buổi chiến game của bạn',1),
('Laptop Acer Gaming Nitro 5 AN515 57 5669 i5 11400H/8GB/512GB/144Hz/4GB GTX1650/Win11',1599,50,'lap5.jpg',250,50,'Laptop Acer Nitro 5 Gaming AN515 57 5669 i5 (NH.QEHSV.001) khơi nguồn mọi cảm hứng game thủ với phong cách thiết kế đậm chất gaming cùng những chuyển động mượt mà với card đồ họa NVIDIA GeForce GTX, mang lại chiến thắng tuyệt đối cho người dùng trên mọi chiến trường ảo.',1),
('Laptop HP Envy X360 13 bf0090TU i7 1250U/16GB/512GB/Touch/Pen/Win11',2759,50,'lap6.jpg',250,50,'Laptop HP Envy X360 13 bf0090TU i7 (76B13PA) - một siêu phẩm laptop cao cấp - sang trọng đến từ nhà HP khi sở hữu những thông số kỹ thuật ấn tượng từ cấu hình mạnh mẽ, màn hình sắc nét cho đến ngoại hình tinh tế, độc đáo với thiết kế gập 360 độ linh hoạt, hứa hẹn không làm người dùng thất vọng.',1),
('Laptop Lenovo Yoga 7 14IRL8 i5 1340P/16GB/512GB/Touch/Pen/OfficeHS/Win11',2299,50,'lap7.jpg',250,50,'Laptop Lenovo Yoga 7 14IRL8 i5 1340P (82YL006AVN) với thiết kế sang trọng, thanh lịch, khả năng gập xoay 360 độ đầy ấn tượng đi kèm hiệu năng vượt trội, mẫu sản phẩm này chắc chắn sẽ là sự lựa chọn hoàn hảo đáp ứng đầy đủ mọi nhu cầu làm việc, học tập và thiết kế cho người dùng',1),
('Laptop Apple MacBook Air 13 inch M2 8GB/256GB (MLY13SA/A)',2499,50,'lap8.jpg',250,50,'Sau 14 năm, ba lần sửa đổi và hai kiến trúc bộ vi xử lý khác nhau, kiểu dáng mỏng dần mang tính biểu tượng của MacBook Air đã đi vào lịch sử. Thay vào đó là một chiếc MacBook Air M2 với thiết kế hoàn toàn mới, độ dày không thay đổi tương tự như MacBook Pro, đánh bật mọi rào cản với con chip Apple M2 đầy mạnh mẽ.',1),
('Laptop Asus Vivobook 15 OLED A1505VA i5 13500H/16GB/512GB/Chuột/Win11',1799,50,'lap9.jpg',250,50,'Bạn đang tìm kiếm cho mình một mẫu laptop học tập - văn phòng mang hiệu năng xử lý mạnh mẽ, khung hình hiển thị sắc nét cùng đa dạng các tính năng hiện đại. Laptop Asus Vivobook 15 OLED A1505VA i5 13500H (L1341W) là một trong những lựa chọn hàng đầu cho việc đáp ứng hoàn hảo nhu cầu công việc, học tập cũng như giải trí thường ngày',1),
('Laptop Asus Gaming ROG Zephyrus G16 GU605MV Ultra 9 185H/32GB/1TB/8GB RTX4060/240Hz/Túi/Win11',6699,50,'lap10.jpg',250,50,'Mẫu máy xách tay tương lai cho mọi nhu cầu của bạn, laptop Asus Gaming ROG Zephyrus G16 GU605MV Ultra 9 185H (QR135W) với ngoại hình chuẩn cao cấp như những mẫu ultrabook, cấu hình khủng từ con chip Intel Core Ultra 9, card rời RTX 40 series,... đáp ứng các tựa game khủng, đồ hoạ hay thiết kế web đều trong tầm tay',1),

('Smart Tivi Toshiba 43 inch 43V31MP',549,50,'tv1.jpg',250,50,'Smart Tivi Toshiba 43 inch 43V31MP mang đến hình ảnh Full HD rõ đẹp, sống động với bộ xử lý Regza Engine HG, công nghệ Essential PQ tái tạo chi tiết, màu sắc trung thực, công nghệ Dolby Audio cho âm thanh vòm mạnh mẽ, hệ điều hành Vidaa U7 cùng thư viện ứng dụng đa dạng, dễ dàng sử dụng.',4),
('Google Tivi Sony 4K 55 inch KD-55X77L',1459,50,'tv2.jpg',250,50,'Google Tivi Sony 4K KD-55X77L sở hữu kích thước 55 inch cùng bộ xử lý mạnh mẽ X1 4K cho hình ảnh hiển thị chất lượng 4K sắc nét, công nghệ tạo màu Live Colour, công nghệ S-Master Digital Amplifier thu hút người xem ngay từ cái nhìn đầu tiên, đem đến những thước phim, bản nhạc kịch tính, sống động. Bên cạnh đó, tivi còn trang bị nhiều tính năng giúp ích cho người dùng trong quá trình sử dụng như: trợ lý ảo Google Assistant, AirPlay 2 (iPhone) và Chromecast,...',4),
('Smart Tivi Samsung 4K 55 inch UA55AU7002',884,50,'tv3.jpg',250,50,'Smart Tivi Samsung 4K 55 inch UA55AU7002 nâng tầm trải nghiệm xem với khung hình 4K sắc nét, bộ xử lý Crystal 4K cho màu sắc tái tạo sống động, các chi tiết rõ ràng nhờ công nghệ Contrast Enhancer, hệ điều hành Tizen OS 6.0 thân thiện, làm việc tại nhà thuận tiện cùng chế độ máy tính PC trên tivi.',4),
('Smart Tivi NanoCell LG 4K 65 inch 65NANO76SQA',1689,50,'tv4.jpg',250,50,'Smart Tivi NanoCell LG 4K 65 inch 65NANO76SQA cuốn hút tầm nhìn nhờ màn hình 65 inch thanh mảnh, nội dung hiển thị sắc nét với độ phân giải 4K, tối ưu qua bộ xử lý α5 Gen5 AI 4K, âm thanh sống động cùng công nghệ AI Sound, kho ứng dụng webOS 22 phong phú và điều khiển đầy thông minh qua Magic Remote, AI ThinQ mang đến trải nghiệm tuyệt vời.',4),
('Smart Tivi LG 4K 65 inch 65UQ8000PSC',1349,50,'tv5.jpg',250,50,'Smart Tivi LG 4K 65 inch 65UQ8000PSC mang đến cảm xúc đắm chìm khi trải nghiệm nghe nhìn, với khung hình 4K tương phản rực rỡ từ HDR10 Pro, âm thanh chân thực tinh chỉnh theo nội dung qua AI Sound, cùng với 1 thiết kế tinh giản đầy sang chảnh, và kho ứng dụng khổng lồ từ webOS 22 đáp ứng hoàn hảo nhu cầu giải trí của người dùng.',4),
('Android Tivi AQUA 4K 55 inch AQT55D67UG',749,50,'tv6.jpg',250,50,'Android Tivi AQUA 4K 55 inch AQT55D67UG sở hữu màn hình 55 inch, độ phân giải 4K cho hình ảnh sắc nét, dải màu rộng Wide Color Gamut cho những khung hình rực rỡ, tái tạo đa dạng sắc màu. Công nghệ Dolby Digital mang đến trải nghiệm âm thanh ba chiều sống động, chân thực. Trang bị Google Assistant có tiếng Việt và tìm kiếm giọng nói trên YouTube bằng tiếng Việt.',4),
('Smart Tivi Toshiba 4K 55 inch 55E330MP',949,50,'tv7.jpg',250,50,'Smart Tivi Toshiba 4K 55 inch 55E330MP thiết kế tối giản, sang trọng với màn hình 55 inch, bộ xử lý Regza Engine ZR tối ưu chất lượng hình ảnh, công nghệ Ultra Essential PQ tái tạo khung hình chân thật, công nghệ Dolby Vision IQ đảm bảo cảnh quay hiển thị đúng như ý tưởng của nhà làm phim, công nghệ Dolby Atmos đem đến âm thanh vòm sống động như ở rạp hát, tìm kiếm bằng giọng nói qua ứng dụng VIDAA dễ dàng.',4),
('Smart Tivi LG 4K 43 inch 43UQ7550PSF',899,50,'tv8.jpg',250,50,'Smart Tivi LG 4K 43 inch 43UQ7550PSF sở hữu thiết kế tinh tế, màn hình độ phân giải 4K, nâng tầm trải nghiệm xem với bộ xử lý α5 Gen5 AI 4K, hình ảnh sống động cùng công nghệ Active HDR, chất âm AI Sound phù hợp với nội dung bạn đang trải nghiệm, dễ dàng tìm kiếm bằng giọng nói tiếng Việt với Magic Remote.',4),
('Google Tivi Sony 4K 55 inch KD-55X80L',1689,50,'tv9.jpg',250,50,'Series Tivi BRAVIA Sony X80L được Tech Awards 2023 bình chọn là TV phổ thông tốt nhất năm.',4),
('Google Tivi TCL 4K 65 inch 65P635',999,50,'tv10.jpg',250,50,'Google Tivi TCL 4K 65 inch 65P635 chinh phục người dùng trong thiết kế tràn viền thanh mảnh sang trọng, màn hình 4K sắc nét, tương phản sống động nhờ công nghệ HDR10 và Smart HDR, mang đến âm thanh vòm lan tỏa từ công nghệ Dolby Audio và DTS, cùng các tiện ích sử dụng thông minh và kho ứng dụng Google TV phong phú, thỏa mãn từng khung giờ giải trí tại gia đình.',4),

('Máy in laser trắng đen đơn năng Canon LBP2900',409,50,'ink1.jpg',250,50,'Máy in laser trắng đen Canon LBP2900 có thiết kế hiện đại và nhỏ gọn, tốc độ in ấn nhanh kết hợp với nhiều tính năng tiên tiến tích hợp, chắc chắn sẽ là một lựa chọn lý tưởng cho văn phòng, doanh nghiệp vừa và nhỏ, cũng như các hộ gia đình.',5),
('Máy in laser trắng đen đơn năng Brother HL-L2366DW Wifi',399,50,'ink2.jpg',250,50,'Máy in laser Brother HL-L2366DW có thiết kế hiện đại và đa dạng tính năng tiên tiến, không chỉ làm tôn lên không gian làm việc mà còn giúp tối ưu hóa quá trình in ấn hàng ngày một cách tiện lợi.',5),
('Máy in phun màu đa năng Brother DCP-T220',290,50,'ink3.jpg',250,50,'Thiết kế đơn giản, màu đen sang trọng, dễ dùng cho mọi không gian',5),
('Máy in laser trắng đen đơn năng HP LaserJet M211d (9YF82A)',299,50,'ink4.jpg',250,50,'HP LaserJet M211d (9YF82A) mang kích thước nhỏ gọn, phù hợp lắp đặt trên bàn làm việc, kệ tủ với chiều dài 355 mm, rộng 279.5 mm, cao 205 mm và khối lượng chỉ 5.6 kg. Thiết kế tông màu trắng đen đơn giản, thanh lịch, dùng tốt cho mọi không gian.',5),
('Máy in phun màu đa năng HP Smart Tank 580 Wifi (1F3Y2A)',389,50,'ink5.jpg',250,50,'Máy in HP có thiết kế tinh xảo với lớp vỏ phủ màu trắng trang nhã, kiểu dáng gọn gàng có kích thước dài 580.65 mm, rộng 434.66 mm, cao 259.37 mm, nặng 5.03 kg thích hợp tô điểm cho không gian làm việc trở nên sang trọng. Dễ dàng thực hiện in ấn khi trang bị các nút bấm có ký hiệu dễ nhận biết cùng màn hình 1.2 inch',5),
('Máy in laser trắng đen đơn năng Canon LBP6030W Wifi',349,50,'ink6.jpg',250,50,'Nếu bạn đang tìm kiếm một máy in nhỏ gọn, mang phong cách hiện đại, với tốc độ in nhanh và tích hợp đa dạng các tính năng tiện ích, thì máy in Laser Canon LBP 6030W có thể là một sự lựa chọn rất hợp lý phù hợp cho cả doanh nghiệp lẫn người dùng cá nhân.',5),
('Máy in phun màu đa năng Brother DCP-T720DW Wifi',579,50,'ink7.jpg',250,50,'Máy in phun màu đa năng In-Scan-Copy Brother DCP-T720DW được thiết kế với kiểu dáng gọn gàng, các chi tiết tinh tế, dễ dàng bố trí trên bàn làm việc, kệ tủ trong phòng khách, phòng ngủ của gia đình hoặc văn phòng làm việc ở công ty.',5),
('Máy in laser trắng đen đa năng Brother DCP-B7535DW Wifi',569,50,'ink8.jpg',250,50,'Khi cân nhắc về một mẫu máy in cho doanh nghiệp thì Máy in Laser trắng đen đa năng Brother DCP-B7535DW wifi  chắc chắn là sự lựa chọn lý tưởng, không chỉ có thiết kế ngoại hình hiện đại và sang trọng, mà máy in còn tích hợp một loạt các công nghệ in ấn tiên tiến.',5),
('Máy In Phun Màu Đa Năng Epson EcoTank L3210 (C11CJ68501)',344,50,'ink9.jpg',250,50,'Máy In Phun Màu Đa Năng Epson EcoTank L3210 (C11CJ68501) tích hợp đa dạng chức năng, in ấn hiệu quả với tốc độ cao và cung cấp bản in sắc nét, từ đó góp phần làm tăng năng suất làm việc. ',5),
('Máy in laser trắng đen đơn năng HP LaserJet M211dw Wifi (9YF83A)',21,50,'ink10.jpg',250,50,'Kiểu dáng máy in laser trắng đen tinh tế, thân máy dạng khối vững chắc, sắc trắng phối màu đen phù hợp với thiết kế nội thất của nhiều không gian, kích cỡ 356 x 216 x 152.4 mm cho bạn tiện di chuyển và lắp đặt trong phòng làm việc.',5),

('Pin sạc dự phòng 10000mAh Type C PD QC3.0 22.5W Xmobile T121',48,50,'gear1.jpg',250,50,'Pin sạc dự phòng 10000mAh Type C PD QC3.0 22.5W Xmobile T121 sở hữu thiết kế theo xu hướng nhỏ gọn, tiện lợi mang theo bất cứ đâu, diện mạo trẻ trung, cung cấp năng lượng cho các thiết bị tương đối nhanh, mang đến cho bạn những trải nghiệm tốt nhất.',6),
('Pin sạc dự phòng 10000 mAh Type C PD 25W Samsung EB-P3400',68,50,'gear2.jpg',250,50,'Pin sạc dự phòng 10000 mAh Type C PD Samsung EB-P3400 sở hữu kiểu dáng mỏng nhẹ, gam màu tinh tế, dung lượng pin lớn cùng hiệu suất sạc khá cao, hứa hẹn mang đến cho người dùng những trải nghiệm vô cùng tuyệt vời.',6),
('Tai nghe Bluetooth True Wireless AVA+ FreeGo PT62',31,50,'gear3.jpg',250,50,'Với gam màu thanh lịch, kiểu dáng đẹp mắt, âm thanh sống động và rõ ràng, kết nối không dây nhanh chóng, hỗ trợ Game Mode,... Tai nghe Bluetooth True Wireless AVA+ FreeGo PT62 sẽ đáp ứng tốt các nhu cầu sử dụng cơ bản của người dùng.',6),
('Tai nghe Bluetooth True Wireless OPPO Enco Buds 2 Pro E510A',109,50,'gear4.jpg',250,50,'Thả mình vào các bài nhạc yêu thích với tai nghe Bluetooth True Wireless OPPO Enco Buds 2 Pro E510A sở hữu thiết kế nhỏ gọn cùng vẻ ngoài thời thượng, được tích hợp nhiều tính năng hấp dẫn.',6),
('Loa Bluetooth Sony SRS-XB100',105,50,'gear5.jpg',250,50,'Loa Bluetooth Sony SRS-XB100 sở hữu thiết kế vô cùng nhỏ gọn, độ bền cao, chất âm ấn tượng cùng thời lượng pin lâu dài,... đáp ứng đa dạng nhu cầu sử dụng của người dùng mọi lúc mọi nơi.',6),
('Loa Bluetooth Rezo Wooden Box',62,50,'gear6.jpg',250,50,'Loa Bluetooth Rezo Wooden Box mang một diện mạo cổ điển, thanh lịch với chất liệu gỗ cao cấp với kích thước nhỏ gọn, khả năng tái tạo âm thanh sống động, đáp ứng tốt nhu cầu giải trí cơ bản của người dùng.',6),
('Chuột Có dây Gaming Asus TUF M3',29,50,'gear7.jpg',250,50,'Chuột Gaming Asus TUF M3 Đen có thiết kế nhỏ gọn, cùng chất liệu nhựa có độ ma sát cao giúp cho việc cầm nắm chắc chắn hơn. Thiết kế công thái học phù hợp với người thuận tay phải. Khối lượng chỉ 84 gram khá nhẹ, tiện dụng.',6),
('Chuột Có dây Gaming Logitech G102 Gen2 Lightsync',40.5,50,'gear8.jpg',250,50,'Mệnh danh là một “siêu chuột quốc dân" Logitech G102 Gen 2 Lightsync sở hữu hiệu năng cực cao cùng loạt tính năng: dải LED 16.8 triệu màu, nút bấm bền bỉ, chân chuột dày trơn mượt kèm theo một mức giá hầu bao phù hợp với những bạn muốn sự đơn giản nhưng vẫn đi đôi với chất lượng.',6),
('Bàn Phím Không Dây DareU EK807G',51,50,'gear9.jpg',250,50,'Bàn Phím Không Dây DareU EK807G có khối lượng nhẹ với kích thước gọn gàng, thiết kế không dây cho phép dùng linh hoạt, để bạn tùy chọn vị trí sử dụng phù hợp nhất cho riêng mình.',6),
('Bàn Phím Có Dây DareU EK87',49,50,'gear10.jpg',250,50,'DareU EK87 - chiếc bàn phím Tenkeyless 87 phím đến từ nhà DareU, thiết kế từ nhựa ABS kết hợp cùng Red Switch mang lại âm thanh gõ phím cực kỳ đã tai. Chiếc bàn phím này sở hữu tông màu thời thượng cực kỳ phù hợp với các khách hàng trẻ.',6);