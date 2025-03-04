<?php
include('db/dbconn.php');

if (isset($_POST['signup'])) {
	$firstname = trim($_POST['firstname']);
	$mi = trim($_POST['mi']);
	$lastname = trim($_POST['lastname']);
	$address = trim($_POST['address']);
	$country = trim($_POST['country']);
	$zipcode = trim($_POST['zipcode']);
	$mobile = trim($_POST['mobile']);
	$telephone = trim($_POST['telephone']);
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);

	// Kiểm tra các trường bắt buộc không được để trống
	if (empty($firstname) || empty($lastname) || empty($address) || empty($country) || empty($zipcode) || empty($mobile) || empty($email) || empty($password)) {
		 echo "<script>alert('Làm ơn điền đầy đủ thông tin')</script>";
		
// echo "<script>
//     document.addEventListener('DOMContentLoaded', function() {
//         $('#signup').modal('show'); // Hiển thị modal đăng ký
//         document.getElementById('email').focus(); // Đặt con trỏ vào ô nhập email trong modal đăng ký
//     });
// </script>";


	}
	// Kiểm tra định dạng email
	elseif (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.(com)$/", "example@gmail.com")) {
		//echo "<script>alert('Định dạng email không hợp lệ: xxx123@gmail.com')</script>";
		echo "<script>
		document.addEventListener('DOMContentLoaded', function() {
			var emailField = document.getElementById('email');
			emailField.setCustomValidity('Sai định dạng email. Ví dụ đúng: xxx123@gmail.com');
			$('#signup').modal('show'); // Hiển thị modal đăng ký
			emailField.focus(); // Đặt con trỏ vào ô nhập email
			emailField.reportValidity(); // Kích hoạt thông báo lỗi
			// Xóa thông báo lỗi khi người dùng nhập lại
			emailField.addEventListener('input', function() {
				emailField.setCustomValidity(''); 
			});
		});
	</script>";
	}
	// Kiểm tra email đã tồn tại hay chưa
	else {
		$check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM customer WHERE email = '$email'"));
		if ($check > 0) {
			
			echo "<script>
			document.addEventListener('DOMContentLoaded', function() {
				alert('EMAIL ĐÃ TỒN TẠI. LÀM PHIỀN BẠN ĐĂNG KÍ BẰNG EMAIL KHÁC 😭');
				$('#signup').modal('show'); // Hiển thị modal đăng ký
				document.getElementById('email').focus(); // Đặt con trỏ vào ô nhập email
			});
		</script>";
			
		} 
		
		// Kiểm tra số điện thoại đã tồn tại hay chưa
	else {
		$checkmobile = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM customer WHERE mobile = '$mobile'"));
		if ($checkmobile > 0) {
			
			echo "<script>
			document.addEventListener('DOMContentLoaded', function() {
				alert('SỐ ĐIỆN THOẠI ĐÃ TỒN TẠI. LÀM PHIỀN BẠN ĐĂNG KÍ SỐ ĐIỆN THOẠI KHÁC 😭');
				$('#signup').modal('show'); // Hiển thị modal đăng ký
				document.getElementById('mobile').focus(); // Đặt con trỏ vào ô nhập mobile
			});
		</script>";
			
		}
		else {
			$insert = mysqli_query($conn, "INSERT INTO customer (firstname, mi, lastname, address, country, zipcode, mobile, telephone, email, password)
                    VALUES ('$firstname', '$mi', '$lastname', '$address', '$country', '$zipcode', '$mobile', '$telephone', '$email', '$password')")
				or die(mysqli_error($conn));

			if ($insert) {
				echo "<script>alert('Đăng kí thành công!');</script>";
				// Tự động focus vào login modal
				echo "<script>document.addEventListener('DOMContentLoaded', function() {
                    $('#login').modal('show');
                    document.getElementById('login-email').focus();
                });</script>";
				//làm mới trang sau khi đăng kí thành công
				
			} else {
				echo "<script>alert('Có lỗi xảy ra, vui lòng thử lại sau')</script>";
			}
		}
	}
}
}