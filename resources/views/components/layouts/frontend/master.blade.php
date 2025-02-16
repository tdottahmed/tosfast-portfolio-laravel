<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ getSetting('app_name') }}</title>
    <!-- Favicon img -->
    <link rel="shortcut icon" href="assets/frontend/images/favicon.png">
    <!-- Bootstarp min css -->
    <link rel="stylesheet" href="assets/frontend/css/bootstrap.min.css">
    <!-- Mean menu css -->
    <link rel="stylesheet" href="assets/frontend/css/meanmenu.css">
    <!-- All min css -->
    <link rel="stylesheet" href="assets/frontend/css/all.min.css">
    <!-- Swiper bundle min css -->
    <link rel="stylesheet" href="assets/frontend/css/swiper-bundle.min.css">
    <!-- Magnigic popup css -->
    <link rel="stylesheet" href="assets/frontend/css/magnific-popup.css">
    <!-- Animate css -->
    <link rel="stylesheet" href="assets/frontend/css/animate.css">
    <!-- Nice select css -->
    <link rel="stylesheet" href="assets/frontend/css/nice-select.css">
    <!-- Style css -->
    <link rel="stylesheet" href="assets/frontend/css/style.css">
</head>

<body>

    <!-- Preloader area start -->
    <div class="loading">
        <span class="text-capitalize">L</span>
        <span>o</span>
        <span>a</span>
        <span>d</span>
        <span>i</span>
        <span>n</span>
        <span>g</span>
    </div>
    <div id="preloader">
    </div>
    <!-- Preloader area end -->

    <!-- Mouse cursor area start here -->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    <!-- Mouse cursor area end here -->

    <!-- Top header area start here -->
    <x-layouts.frontend.header-top />
    <!-- Top header area end here -->

    <!-- Header area start here -->
    <x-layouts.frontend.header />
    <!-- Header area end here -->

    <!-- Sidebar area start here -->
    <x-layouts.frontend.sidebar />
    <!-- Sidebar area end here -->

    <!-- Fullscreen search area start here -->
    <x-layouts.frontend.search />
    <!-- Fullscreen search area end here -->

    <!-- Main area start here -->
    <main>
        {{ $slot }}
    </main>
    <!-- Main area end here -->

    <!-- Footer area start here -->
    <x-layouts.frontend.footer />
    <!-- Footer area end here -->

    <!-- Back to top area start here -->
    <div class="scroll-up">
        <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Back to top area end here -->

    <!-- Jquery 3.7.0 Min Js -->
    <script src="assets/frontend/js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap min Js -->
    <script src="assets/frontend/js/bootstrap.min.js"></script>
    <!-- Mean menu Js -->
    <script src="assets/frontend/js/meanmenu.js"></script>
    <!-- Swiper bundle min Js -->
    <script src="assets/frontend/js/swiper-bundle.min.js"></script>
    <!-- Counterup min Js -->
    <script src="assets/frontend/js/jquery.counterup.min.js"></script>
    <!-- Wow min Js -->
    <script src="assets/frontend/js/wow.min.js"></script>
    <!-- Pace min Js -->
    <script src="assets/frontend/js/pace.min.js"></script>
    <!-- Magnific popup min Js -->
    <script src="assets/frontend/js/magnific-popup.min.js"></script>
    <!-- Nice select min Js -->
    <script src="assets/frontend/js/nice-select.min.js"></script>
    <!-- Isotope pkgd min Js -->
    <script src="assets/frontend/js/isotope.pkgd.min.js"></script>
    <!-- Waypoints Js -->
    <script src="assets/frontend/js/jquery.waypoints.js"></script>
    <!-- Script Js -->
    <script src="assets/frontend/js/script.js"></script>
    <!-- Add SweetAlert CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('super-admin')))
        <script>
            $(document).ready(function() {
                $(document).on("click", ".editable", function() {
                    let $this = $(this);
                    let text = $this.text().trim();
                    let key = $this.data("key");

                    let textarea = $("<textarea>", {
                        class: "form-control d-inline-block w-100",
                        text: text,
                        "data-key": key
                    });

                    let checkIcon = $("<i>", {
                        class: "fa-solid fa-check text-success ms-2 cursor-pointer check-icon"
                    });

                    $this.replaceWith(textarea);
                    textarea.after(checkIcon);
                    textarea.focus();
                });

                $(document).on("click", ".check-icon", function() {
                    let textarea = $(this).prev("textarea");
                    let checkIcon = $(this);
                    if (textarea.length && checkIcon.length) {
                        saveContent(textarea, checkIcon);
                    } else {
                        console.error("Textarea or check icon not found!");
                    }
                });

                function saveContent(textarea, checkIcon) {
                    let newText = textarea.val().trim();
                    let key = textarea.data("key");

                    $.ajax({
                        url: "/update-content",
                        type: "POST",
                        data: {
                            key: key,
                            content: newText
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        },
                        success: function(response) {
                            if (response.success) {
                                revertToText(textarea, checkIcon, newText);
                                Swal.fire({
                                    title: "Success!",
                                    text: "Content updated successfully.",
                                    icon: "success",
                                    timer: 1500,
                                    showConfirmButton: false
                                });
                            } else {
                                alert("Failed to update content.");
                            }
                        },
                        error: function() {
                            alert("Error saving content.");
                        }
                    });
                }

                function revertToText(textarea, checkIcon, text) {
                    let span = $("<span>", {
                        class: "editable",
                        "data-key": textarea.data("key"),
                        text: text
                    });

                    checkIcon.remove();
                    textarea.replaceWith(span);
                }


            });
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "/get-content",
                type: "GET",
                success: function(response) {
                    response.data.forEach(item => {
                        $(`[data-key="${item.key}"]`).text(item.content);
                    });
                }
            });
        });
    </script>
</body>


</html>
