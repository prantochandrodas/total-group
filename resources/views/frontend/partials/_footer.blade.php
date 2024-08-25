<footer class="footer">
    <div class="footer_width d-flex justify-content-between flex-column flex-md-row align-items-center gap-4">
        <div class="footer_logo">
            <img src="{{ asset('images/'.$application->logo) }}" alt="">
        </div>
        <div class="d-flex gap-4 flex-column flex-md-row">
            <div class="d-flex footer_contact gap-2 align-items-center">
                <img src="https://edison-bd.com/images/round-phone.svg" alt="">
                <div class="text-light">
                    <p>{{$application->phone_1}}</p>
                    <p>{{$application->phone_2}}</p>
                </div>
            </div>
            <div class="d-flex gap-2 align-items-center">
                <img src="https://edison-bd.com/images/round-mail.svg" alt="">
                <p class="text-light">{{$application->email}}</p>
            </div>
        </div>
        <div class="text-white">
            <p class="w-md-75 w-100 text-center text-md-start  float-end">{{$application->address}}</p>
        </div>
    </div>
    <div class="footer_copyright d-flex justify-content-between flex-column flex-md-row align-items-center ">
        <div>
            <p class="text-white">Copyright © STITBD</p>
        </div>
        <div class="footer_privacy d-flex justify-content-between flex-column flex-md-row">
            <a href="#" class="me-0 me-md-4">Terms of use</a>
            <a href="#">Privacy Policy</a>
        </div>
    </div>
</footer>
