@if (session('message'))
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "{{ session('message') }}",
            toast: true,
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            background: "#f0fdf4",
            color: "#065f46",
            iconColor: "#10b981",
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });
    </script>
@endif
