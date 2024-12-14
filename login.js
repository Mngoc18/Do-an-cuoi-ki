document.getElementById("login-form").addEventListener("submit", function (e) { 
    e.preventDefault();

    const phone = document.getElementById("phone").value.trim();
    const password = document.getElementById("password").value.trim();

    if (!phone || !password) {
        alert("Vui lòng nhập đầy đủ thông tin.");
        return;
    }

    fetch("login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `phone=${encodeURIComponent(phone)}&password=${encodeURIComponent(password)}`,
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json(); 
        })
        .then(data => {
            if (data.success) {
                alert(data.message);         
            } else {
                alert(data.message);
            }
        })
        .catch(err => {
            console.error("Có lỗi xảy ra:", err);
            alert("Đã xảy ra lỗi trong quá trình xử lý. Vui lòng thử lại sau.");
        });
});
