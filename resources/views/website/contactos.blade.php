@extends('website\main')
@section('menu')
    <div class="container">
        <div class="row h_menu">
            <nav class="navbar navbar-default navbar-left" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="home">Inicio</a></li>
                        <li><a href="ministerios">Servicios Parroquiales</a></li>
                        <li><a href="online">Servicios Online</a></li>
                        <li><a href="acerca">Acerca de la Parroquia</a></li>
                        <li><a href="noticia">Noticias</a></li>
                        <li class="active"><a href="contactenos">Contactenos</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <div class="main_bg"><!-- start main -->
        <div class="container">
            <div class="main row">
                <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe>
            </div>
        </div>
    </div><!-- end main -->
    <div class="main_btm"><!-- start main_btm -->
        <div class="container">
            <div class="main row">
                <div class="col-md-4 company_ad">
                    <h2>find Address :</h2>
                    <address>
                        <p>500 Lorem Ipsum Dolor Sit,</p>
                        <p>22-56-2-9 Sit Amet, Lorem,</p>
                        <p>USA</p>
                        <p>Phone:(00) 222 666 444</p>
                        <p>Fax: (000) 000 00 00 0</p>
                        <p>Email: <a href="mailto:info@mycompany.com">info(at)mycompany.com</a></p>
                        <p>Follow on: <a href="#">Facebook</a>, <a href="#">Twitter</a></p>
                    </address>
                </div>
                <div class="col-md-8">
                    <div class="contact-form">
                        <h2>Contact Us</h2>
                        <form method="post" action="contact-post.html">
                            <div>
                                <span>name</span>
                                <span><input type="username" class="form-control" id="userName"></span>
                            </div>
                            <div>
                                <span>e-mail</span>
                                <span><input type="email" class="form-control" id="inputEmail3"></span>
                            </div>
                            <div>
                                <span>subject</span>
                                <span><textarea name="userMsg"> </textarea></span>
                            </div>
                            <div>
                                <label class="fa-btn btn-1 btn-1e"><input type="submit" value="submit us"></label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    @endsection


