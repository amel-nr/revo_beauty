@extends('frontend.layouts.app')

@section('style')

<style>
    .button-alphabet {
        color: black; 
        font-weight: 700; 
        font-size: 20px; 
        margin-left: 12px; 
        margin-right: 12px;
    }

    .button-alphabet:hover, .button-brandfilter:hover {
        color: #f3795c;
    }

    .alphabet-content {
        border-top: 1px solid #f3795c;
        margin-top: 1rem;
        padding-top: 2rem;
    }

    .button-brandfilter {
        color: black;
        font-weight: 500;
        font-size: 14px !important;
    }

    .active {
        color: #f3795c;
    }
</style>

@endsection

@section('content')

<div style="background-color: #FCF8F0;">
    <div class="" style="background-color: #f3795c;">
        <h1 class="text-center py-4 font-weight-bold" style="color: white;">Brands</h1>
    </div>
    <div class="py-4 container">
        <div id="parent" class="container text-center pt-4">
            <a href="#" id="alp-a" class="button-alphabet">A</a>
            <a href="#" id="alp-b" class="button-alphabet">B</a>
            <a href="#" id="alp-c" class="button-alphabet">C</a>
            <a href="#" id="alp-d" class="button-alphabet">D</a>
            <a href="#" id="alp-e" class="button-alphabet">E</a>
            <a href="#" id="alp-f" class="button-alphabet">F</a>
            <a href="#" id="alp-g" class="button-alphabet">G</a>
            <a href="#" id="alp-h" class="button-alphabet">H</a>
            <a href="#" id="alp-i" class="button-alphabet">I</a>
            <a href="#" id="alp-j" class="button-alphabet">J</a>
            <a href="#" id="alp-k" class="button-alphabet">K</a>
            <a href="#" id="alp-l" class="button-alphabet">L</a>
            <a href="#" id="alp-m" class="button-alphabet">M</a>
            <a href="#" id="alp-n" class="button-alphabet">N</a>
            <a href="#" id="alp-o" class="button-alphabet">O</a>
            <a href="#" id="alp-p" class="button-alphabet">P</a>
            <a href="#" id="alp-q" class="button-alphabet">Q</a>
            <a href="#" id="alp-r" class="button-alphabet">R</a>
            <a href="#" id="alp-s" class="button-alphabet">S</a>
            <a href="#" id="alp-t" class="button-alphabet">T</a>
            <a href="#" id="alp-u" class="button-alphabet">U</a>
            <a href="#" id="alp-v" class="button-alphabet">V</a>
            <a href="#" id="alp-w" class="button-alphabet">W</a>
            <a href="#" id="alp-x" class="button-alphabet">X</a>
            <a href="#" id="alp-y" class="button-alphabet">Y</a>
            <a href="#" id="alp-z" class="button-alphabet">Z</a>
            <div class="row alp-a alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">A</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Aeris</p></a>
                            <a href="#"><p class="button-brandfilter">Aknema</p></a>
                            <a href="#"><p class="button-brandfilter">Aksi Beauty</p></a>
                            <a href="#"><p class="button-brandfilter">Apot.Care</p></a>
                            <a href="#"><p class="button-brandfilter">Aqua+ Series</p></a>
                        </div>
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Argavell</p></a>
                            <a href="#"><p class="button-brandfilter">Avajar</p></a>
                            <a href="#"><p class="button-brandfilter">Avene</p></a>
                            <a href="#"><p class="button-brandfilter">Avoskin</p></a>
                            <a href="#"><p class="button-brandfilter">Azarine</p></a>
                        </div>
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Aztec Secret</p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-b alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">B</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Banila Co</p></a>
                            <a href="#"><p class="button-brandfilter">Beau</p></a>
                            <a href="#"><p class="button-brandfilter">Beaussentials</p></a>
                            <a href="#"><p class="button-brandfilter">Beautitarian</p></a>
                            <a href="#"><p class="button-brandfilter">Beauty Blender</p></a>
                        </div>
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Benefit Cosmetics</p></a>
                            <a href="#"><p class="button-brandfilter">Benton</p></a>
                            <a href="#"><p class="button-brandfilter">Bhumi</p></a>
                            <a href="#"><p class="button-brandfilter">Bioderma</p></a>
                            <a href="#"><p class="button-brandfilter">Biossance</p></a>
                        </div>
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Biyu</p></a>
                            <a href="#"><p class="button-brandfilter">Blithe Cosmetic</p></a>
                            <a href="#"><p class="button-brandfilter">Blush Me Up</p></a>
                            <a href="#"><p class="button-brandfilter">Botanity</p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-c alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">C</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Callista</p></a>
                            <a href="#"><p class="button-brandfilter">Clarisonic</p></a>
                            <a href="#"><p class="button-brandfilter">Clinique</p></a>
                            <a href="#"><p class="button-brandfilter">Clio Professional</p></a>
                            <a href="#"><p class="button-brandfilter">Cos-Vie by Lacoco</p></a>
                        </div>
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Cosnori</p></a>
                            <a href="#"><p class="button-brandfilter">Cremorlab</p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-d alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">D</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Dermaceutic</p></a>
                            <a href="#"><p class="button-brandfilter">Dermatologic Cosmetic Laboratories</p></a>
                            <a href="#"><p class="button-brandfilter">Dr.Jart+</p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-e alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">E</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">ElshéSkin</p></a>
                            <a href="#"><p class="button-brandfilter">Emina</p></a>
                            <a href="#"><p class="button-brandfilter">Envygreen</p></a>
                            <a href="#"><p class="button-brandfilter">Eucalie</p></a>
                            <a href="#"><p class="button-brandfilter">Evershine</p></a>
                        </div>
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Evian</p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-f alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">F</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Femme</p></a>
                            <a href="#"><p class="button-brandfilter">For Skin's Sake</p></a>
                            <a href="#"><p class="button-brandfilter">Foreo</p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-g alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">G</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">G9Skin</p></a>
                            <a href="#"><p class="button-brandfilter">GlamGlow</p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-h alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">H</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Hale</p></a>
                            <a href="#"><p class="button-brandfilter">Haluu Essentials</p></a>
                            <a href="#"><p class="button-brandfilter">Hanada</p></a>
                            <a href="#"><p class="button-brandfilter">Haple</p></a>
                            <a href="#"><p class="button-brandfilter">Harlette Beauty</p></a>
                        </div>
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Haum</p></a>
                            <a href="#"><p class="button-brandfilter">Heimish</p></a>
                            <a href="#"><p class="button-brandfilter">Huxley</p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-i alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">I</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Id Placosmetics</p></a>
                            <a href="#"><p class="button-brandfilter">Indoganic</p></a>
                            <a href="#"><p class="button-brandfilter">Inglot</p></a>
                            <a href="#"><p class="button-brandfilter">Innertrue</p></a>
                            <a href="#"><p class="button-brandfilter">Iomi</p></a>
                        </div>
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Isabelle Lancray</p></a>
                            <a href="#"><p class="button-brandfilter">Iunik</p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-j alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">J</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Jacquelle</p></a>
                            <a href="#"><p class="button-brandfilter">Jarte Beauty</p></a>
                            <a href="#"><p class="button-brandfilter">Joylab</p></a>
                            <a href="#"><p class="button-brandfilter">Jumiso</p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-k alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">K</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Kiehl's</p></a>
                            <a href="#"><p class="button-brandfilter">Kissforri</p></a>
                            <a href="#"><p class="button-brandfilter">Klairs</p></a>
                            <a href="#"><p class="button-brandfilter">Kleveru</p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-l alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">L</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Lacoco</p></a>
                            <a href="#"><p class="button-brandfilter">Lamica</p></a>
                            <a href="#"><p class="button-brandfilter">Langsre</p></a>
                            <a href="#"><p class="button-brandfilter">Leaders Cosmetics</p></a>
                            <a href="#"><p class="button-brandfilter">Liplapin</p></a>
                        </div>
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Luxcrime</p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-m alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">M</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">Mad For Makeup</p></a>
                            <a href="#"><p class="button-brandfilter">Make Over</p></a>
                            <a href="#"><p class="button-brandfilter">Make Up For Ever</p></a>
                            <a href="#"><p class="button-brandfilter">Maska</p></a>
                            <a href="#"><p class="button-brandfilter">Mediental</p></a>
                        </div>
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter">MOB Cosmetics</p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-n alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">N</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter"></p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-o alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">O</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter"></p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-p alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">P</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter"></p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-q alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">Q</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter"></p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-r alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">R</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter"></p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-s alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">S</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter"></p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-t alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">T</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter"></p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-u alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">U</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter"></p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-v alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">V</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter"></p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-w alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">W</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter"></p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-x alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">X</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter"></p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-y alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">Y</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter"></p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row alp-z alphabet-content">
                <div class="col-2 my-auto">
                    <p class="mb-0" style="font-weight: 700; font-size: 35px;">Z</p>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-3 text-left">
                            <a href="#"><p class="button-brandfilter"></p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".button-alphabet").click(function(){
               $(".button-alphabet").removeClass('active');
               $(this).addClass('active');
            });
            $(".button-brandfilter").click(function(){
               $(".button-brandfilter").removeClass('active');
               $(this).addClass('active');
            });
            $('.button-alphabet').click(function() {
                var $el = $('.' + this.id).fadeIn(450);
                $('#parent > div').not($el).hide();
            })
        });
    </script>
@endsection