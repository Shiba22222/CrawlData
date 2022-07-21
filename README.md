1. Chạy lệnh composer install. 
2. Chạy lệnh php artisan serve.
3. Chạy lệnh php artisan command:createPermissionRoutes để lưu các Route vào DB.
4. Chạy lệnh php artisan command:createRoles để tạo các quyền Admin,..
5. Chạy lệnh php artisan db:seed --class=CreateSupperAdminSeeder để tạo tài khoản Admin.
- Tài khoản: giakinh451@gmail.com
- Mật khẩu: 123456
6. Vào trang http://127.0.0.1:8000/login để đăng nhập nếu đăng nhập bằng quyền admin thì sẽ vào được trang quản lí của Admin.
7. Vào trang http://127.0.0.1:8000/register để đăng kí tài khoản. Nếu đăng kí ở đây thì tài khoản không có quyền chỉ có thể xem được các bài báo ở trang chủ. Cần phải có tài khoản Admin cấp quyền thì tài khoản đăng kí mới có thể vào được trang quản lí.
8. Sau khi đăng nhập mà tài khoản đang có quyền là admin thì sẽ vào http://127.0.0.1:8000/admin/posts.
- Ấn vào Bắt đầu lấy dữ liệu từ VNExpress để lấy dữ liệu về.
- Những bài báo đã chuyển sang Publish mới hiện ở ngoài trang chủ.
9. Ngoài ra còn có tính năng quản lí tài khoản và quản lí Role.

