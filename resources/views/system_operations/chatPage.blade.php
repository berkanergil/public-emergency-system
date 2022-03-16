@extends('layouts.chatboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth/chatPage.css') }}">
@endsection

@section('content')
    <div id="frame">
        <div class="content">
            <div class="contact-profile">
                <div class="close-container">
                    <a href="{{ route('statistics') }}">
                        <div class="leftright"></div>
                        <div class="rightleft"></div>
                    </a>
                </div>
                <p class="pl-5">Harvey Specter</p>
                <div class="social-media">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </div>
            </div>
            <div class="messages ">
                <ul>
                    <li class="sent">
                        <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
                    </li>
                    <li class=" replies">
                        <p>When you're backed against the wall, break the god damn thing down.</p>
                    </li>
                    <li class="replies">
                        <p>Excuses don't win championships.</p>
                    </li>
                    <li class="sent">
                        <p>Oh yeah, did Michael Jordan tell you that?</p>
                    </li>
                    <li class="replies">
                        <p>No, I told him that.</p>
                    </li>
                    <li class="replies">
                        <p>What are your choices when someone puts a gun to your head?</p>
                    </li>
                    <li class="sent">
                        <p>What are you talking about? You do what they say or they shoot you.</p>
                    </li>
                    <li class="replies">
                        <p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any
                            one of a hundred and forty six other things.</p>
                    </li>
                </ul>
            </div>
            <div class="message-input">
                <div class="wrap">
                    <input type="text" placeholder="Write your message..." />
                    <input class="file_inputting" multiple type="file"><i class="fa fa-paperclip attachment"
                        aria-hidden="true"></i>
                    <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
        <div id="sidepanel">
            <div id="profile">
                <div class="wrap text-center">
                    <p>Mike Ross</p>
                    <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>

                    <div id="expanded">
                        <label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
                        <input name="twitter" type="text" value="mikeross" />
                        <label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
                        <input name="twitter" type="text" value="ross81" />
                        <label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
                        <input name="twitter" type="text" value="mike.ross" />
                    </div>
                </div>
            </div>
            <div id="search">
                <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                <input type="text" placeholder="Search contacts..." />
            </div>
            <div id="contacts">
                <ul class="chatlist">
                    <li class="contact chatlist">
                        <div class="wrap">
                            <div class="meta">
                                <p class="name">Louis Litt</p>
                                <p class="preview">You just got LITT up, Mike.</p>
                            </div>
                        </div>
                    </li>
                    <li class="contact active chatlist">
                        <div class="wrap">
                            <div class="meta">
                                <p class="name">Harvey Specter</p>
                                <p class="preview">Wrong. You take the gun, or you pull out a bigger one. Or, you
                                    call their bluff. Or, you do any one of a hundred and forty six other things.</p>
                            </div>
                        </div>
                    </li>
                    <li class="contact chatlist">
                        <div class="wrap">
                            <div class="meta">
                                <p class="name">Rachel Zane</p>
                                <p class="preview">I was thinking that we could have chicken tonight, sounds good?
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="contact chatlist">
                        <div class="wrap">
                            <div class="meta">
                                <p class="name">Donna Paulsen</p>
                                <p class="preview">Mike, I know everything! I'm Donna..</p>
                            </div>
                        </div>
                    </li>
                    <li class="contact chatlist">
                        <div class="wrap">
                            <div class="meta">
                                <p class="name">Jessica Pearson</p>
                                <p class="preview">Have you finished the draft on the Hinsenburg deal?</p>
                            </div>
                        </div>
                    </li>
                    <li class="contact chatlist">
                        <div class="wrap">
                            <div class="meta">
                                <p class="name">Harold Gunderson</p>
                                <p class="preview">Thanks Mike! :)</p>
                            </div>
                        </div>
                    </li>
                    <li class="contact chatlist">
                        <div class="wrap">
                            <div class="meta">
                                <p class="name">Daniel Hardman</p>
                                <p class="preview">We'll meet again, Mike. Tell Jessica I said 'Hi'.</p>
                            </div>
                        </div>
                    </li>
                    <li class="contact chatlist">
                        <div class="wrap">
                            <div class="meta">
                                <p class="name">Katrina Bennett</p>
                                <p class="preview">I've sent you the files for the Garrett trial.</p>
                            </div>
                        </div>
                    </li>
                    <li class="contact chatlist">
                        <div class="wrap">
                            <div class="meta">
                                <p class="name">Charles Forstman</p>
                                <p class="preview">Mike, this isn't over.</p>
                            </div>
                        </div>
                    </li>
                    <li class="contact chatlist">
                        <div class="wrap">
                            <div class="meta">
                                <p class="name">Jonathan Sidwell</p>
                                <p class="preview"><span>You:</span> That's bullshit. This deal is solid.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>
@endsection

@section('sweetjs')
    <script>
        $(".messages").animate({
            scrollTop: $(document).height()
        }, "fast");

        $("#profile-img").click(function() {
            $("#status-options").toggleClass("active");
        });

        $(".expand-button").click(function() {
            $("#profile").toggleClass("expanded");
            $("#contacts").toggleClass("expanded");
        });

        $("#status-options ul li").click(function() {
            $("#profile-img").removeClass();
            $("#status-online").removeClass("active");
            $("#status-away").removeClass("active");
            $("#status-busy").removeClass("active");
            $("#status-offline").removeClass("active");
            $(this).addClass("active");

            if ($("#status-online").hasClass("active")) {
                $("#profile-img").addClass("online");
            } else if ($("#status-away").hasClass("active")) {
                $("#profile-img").addClass("away");
            } else if ($("#status-busy").hasClass("active")) {
                $("#profile-img").addClass("busy");
            } else if ($("#status-offline").hasClass("active")) {
                $("#profile-img").addClass("offline");
            } else {
                $("#profile-img").removeClass();
            };

            $("#status-options").removeClass("active");
        });

        function newMessage() {
            message = $(".message-input input").val();
            if ($.trim(message) == '') {
                return false;
            }
            $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>')
                .appendTo($('.messages ul'));
            $('.message-input input').val(null);
            $('.contact.active .preview').html('<span>You: </span>' + message);
            $(".messages").animate({
                scrollTop: $(document).height()
            }, "fast");
        };

        $('.submit').click(function() {
            newMessage();
        });

        $(window).on('keydown', function(e) {
            if (e.which == 13) {
                newMessage();
                return false;
            }
        });
    </script>
@endsection
