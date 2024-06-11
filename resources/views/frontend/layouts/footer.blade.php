<section class="mobile__seo">
    <div class="container">
        <div class="game__seo">
            <div hidden id="title-seo">{{ general()->title }}</div>
            <div class="seo-mobile showFooter">
                <div class="seo-content showFooter">
                    <h1>
                        <strong>Mainkan dan Menangkan Slot di {{ general()->judul }}-Situs kasino online nomor 1 di
                            Indonesia</strong>
                    </h1>
                    <p>
                        Selamat datang di {{ general()->judul }}, situs slot online nomor 1 di Indonesia! Kami bangga
                        menjadi pilihan utama bagi para pecinta slot online yang mencari pengalaman bermain yang tak
                        terlupakan dan kesempatan untuk menangkan hadiah besar. Di {{ general()->judul }}, Anda dapat
                        menikmati berbagai macam permainan slot yang menarik dengan fitur-fitur yang inovatif.
                        Kami memiliki tim ahli yang bekerja keras untuk memastikan pengalaman bermain Anda selalu
                        menyenangkan dan memberikan peluang menang yang baik. Selain itu, kami juga menawarkan layanan
                        pelanggan yang responsif dan ramah, sehingga Anda dapat merasa nyaman dan aman saat bermain di
                        situs kami.
                        Jika Anda mencari situs slot online terpercaya dengan permainan slot yang berkualitas dan hadiah
                        besar,{{ general()->judul }} adalah pilihan yang tepat. Bergabunglah dengan kami sekarang dan
                        rasakan sensasi bermain slot online di situs terbaik di Indonesia!
                    </p>
                    <br>
                    <h3>POIN PENTING {{ general()->judul }}</h3>
                    <ul>
                        <li><strong>Slot di {{ general()->judul }}</strong> merupakan pilihan terbaik bagi para pecinta
                            slot online di Indonesia.</li>
                        <li>{{ general()->judul }} adalah situs slot online nomor 1 di Indonesia dengan permainan slot Mpo
                            yang menarik.</li>
                        <li>Kami menawarkan peluang menang besar dan layanan pelanggan yang responsif dan ramah.</li>
                        <li>Bergabunglah dengan kami sekarang dan rasakan sensasi bermain slot online di situs terbaik
                            di Indonesia!</li>
                    </ul>
                    <p>&nbsp;</p>
                    <h2>
                        Nikmati Peluang Menang Besar dengan Bermain Slot di {{ general()->judul }}
                    </h2>
                    <p>Kami bangga memberikan pengalaman bermain <strong>Slot {{ general()->judul }}</strong> yang tidak
                        hanya menyenangkan, tetapi juga memberikan peluang menang besar. Dalam permainan slot online,
                        peluang menang adalah kuncinya, dan di {{ general()->judul }}, kami menawarkan peluang yang baik
                        untuk meraih kemenangan dan hadiah besar.</p>
                    <p>Kami menawarkan berbagai macam permainan slot yang menarik dan menghibur, dan setiap permainan
                        memiliki peluang menang yang berbeda-beda. Dari permainan klasik hingga permainan terbaru dan
                        paling inovatif, kami memastikan pemain kami memiliki banyak opsi untuk dipilih.</p>
                    <h2>
                        Bergabunglah Bersama Kami dan Rasakan Sensasi Bermain Slot di {{ general()->judul }}
                    </h2>
                    <p>
                        Untuk bergabung dengan kami dan merasakan sensasi bermain Slot di {{ general()->judul }}, Anda
                        hanya perlu mengikuti beberapa langkah mudah. Pertama-tama, Anda perlu mendaftar akun dengan
                        mengisi formulir pendaftaran yang tersedia di situs kami.
                    </p>
                    <p>
                        Setelah mendaftar, Anda dapat melakukan deposit untuk memulai permainan. Kami menyediakan
                        berbagai pilihan metode pembayaran yang mudah dan aman untuk memudahkan Anda melakukan deposit.
                    </p>
                    <p>
                        Setelah deposit berhasil dilakukan, Anda dapat memilih permainan Slot Mpo yang Anda inginkan dan
                        mulai bermain. Nikmati grafis yang menarik dan fitur-fitur bonus yang menggiurkan untuk meraih
                        kemenangan dan hadiah besar.
                    </p>
                    <p>
                        Selain itu, dengan bergabung bersama kami, Anda juga dapat menikmati berbagai keuntungan seperti
                        bonus deposit, cashback, dan promo-promo menarik lainnya. Jangan lewatkan kesempatan untuk
                        memenangkan hadiah besar dan merasakan sensasi bermain Slot Mpo di {{ general()->judul }}.
                    </p>
                    <br>
                    <p>&nbsp;</p>
                    <p class="text-center mt-3">&copy; {{ general()->judul }}. Hakcipta Terpelihara | 18+</p>
                </div>
            </div>
        </div>
    </div>
</section>

@if($popup)
<div class="modal fade show" id="homePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-modal="true" style="padding-right: 17px; display: block;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
            <div class="announcement-title">
                <div class="icon"><i class="fas fa-bullhorn"></i></div>
                <h3 class="text-uppercase">Perhatian.</h3>
            </div>
            <div class="modal-body">
                <div class="announcement-content">
                    <figure class="image">
                        <img src="{{ $popup->gambar }}" alt="announcement-title">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var closeButton = document.querySelector("#homePopup .close");
        if (closeButton) {
            closeButton.addEventListener("click", function() {
                document.cookie = "popup_closed=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
                document.getElementById('homePopup').style.display = 'none';
            });
        }
    });
</script>
