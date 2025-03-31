
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang sản phẩm</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
            /* Style cho các ô nhập */
input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    color: #333;
    background-color: #fff;
    transition: border-color 0.3s, box-shadow 0.3s;
}

input[type="text"]:focus,
input[type="password"]:focus {
    outline: none;
    border-color: #ffa726; /* Cam sáng */
    box-shadow: 0 0 5px rgba(255, 167, 38, 0.5); /* Hiệu ứng ánh sáng */
}

/* Style cho các nút */
input[type="submit"],
button {
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    background: linear-gradient(45deg, #ffa726, #ffca28); /* Cam - Vàng */
    color: #fff;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

input[type="submit"]:hover,
button:hover {
    background: linear-gradient(45deg, #ff9800, #ffc107); /* Cam đậm hơn */
    transform: translateY(-2px); /* Nổi lên khi hover */
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
}

/* Style cho checkbox */
input[type="checkbox"] {
    margin-right: 5px;
}

/* Style cho hộp tìm kiếm */
.box_search input[type="text"] {
    margin-right: 5px;
    display: inline-block;
    width: calc(70% - 10px);
}

.box_search input[type="submit"] {
    display: inline-block;
    width: 30%;
}

        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.5;
        }

        /* Layout chính */
        main.catalog {
            display: flex;
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Phần bên trái */
        .boxleft {
            flex: 3; /* Tỷ lệ phần bên trái lớn hơn */
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Phần bên phải */
        .boxright {
            flex: 1; /* Giảm kích thước phần bên phải */
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .mb {
            margin-bottom: 20px;
        }

        .box_title {
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
        }

        .box_content,
        .box_content2 {
            font-size: 14px;
            line-height: 1.6;
            color: #555;
        }

        .box_content ul,
        .box_content2 ul {
            list-style: none;
            padding: 0;
        }

        .box_content ul li a,
        .box_content2 ul li a {
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
            display: block;
            padding: 5px 0;
        }

        .box_content ul li a:hover,
        .box_content2 ul li a:hover {
            color: #0056b3;
        }

        /* Sản phẩm bán chạy */
        .selling_products {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .selling_products img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
        }

        .selling_products a {
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        .selling_products a:hover {
            color: #007bff;
        }

        /* Responsive */
        @media (max-width: 768px) {
            main.catalog {
                flex-direction: column;
            }

            .boxleft,
            .boxright {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <main class="catalog">
        <!-- Phần bên trái -->
      

        <!-- Phần bên phải -->
        <div class="boxright">
            <div class="mb">
                <div class="box_title">TÀI KHOẢN</div>
                <div class="box_content form_account">
                    <?php
                    if (isset($_SESSION["user"]) && is_array($_SESSION["user"])) {
                        extract($_SESSION["user"]);
                        ?>
                        <div>
                            Xin chào <br>
                            <?php echo $user ?>
                            <li class="form_li"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                            <li class="form_li"><a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a></li>

                            <?php if ($role == 1) { ?>
                                <li class="form_li"><a href="admin/index.php">Đăng nhập admin</a></li>
                            <?php } ?>

                            <li class="form_li"><a href="index.php?act=thoat">Thoát</a></li>
                        </div>
                        <?php
                    } else {
                        ?>
                        <form action="index.php?act=dangnhap" method="POST">
                            <h4>Tên đăng nhập</h4><br>
                            <input type="text" name="user">
                            <h4>Mật khẩu</h4><br>
                            <input type="password" name="pass"><br>
                            <input type="checkbox" name="">Ghi nhớ tài khoản?
                            <br><input type="submit" name="dangnhap" value="Đăng nhập">
                            <li class="form_li"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                            <li class="form_li"><a href="index.php?act=dangky">Đăng kí thành viên</a></li>
                        </form>
                    <?php } ?>
                </div>
            </div>
            <div class="mb">
                <div class="box_title">DANH MỤC</div>
                <div class="box_content2 product_portfolio">
                    <ul>
                        <?php
                        foreach ($dsdm as $dm) {
                            extract($dm);
                            $linkdm = "index.php?act=sanpham&id=" . $id;
                            echo '<li><a href="' . $linkdm . '">' . $name . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <div class="box_search">
            <form action="index.php?act=sanpham" method="POST">
                <input type="text" name="keyword" id="" placeholder="Từ khóa tìm kiếm">
                <input type="submit" name="timkiem" value="Tìm kiếm">
            </form>
        </div>
            </div>
            <div class="mb">
                <div class="box_title">SẢN PHẨM BÁN CHẠY</div>
                <div class="box_content">
                    <?php
                    foreach ($dstop10 as $sp) {
                        extract($sp);
                        $linksp = "index.php?act=sanphamct&id=" . $id;
                        $hinh = $img_path . $img;
                        echo '<div class="selling_products">
                                <img src="' . $hinh . '" alt="Sản phẩm">
                                <a href="' . $linksp . '">' . $name . '</a>
                              </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
