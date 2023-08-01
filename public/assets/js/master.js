let items_carousel_circle = document.querySelectorAll('.index-carousel-layout .carousel-circle-right .items-movie-layout .item');
let box_darks = document.querySelectorAll('.index-carousel-layout .show-item-carousel .image .box-over-image');
let big_image_show = document.querySelector('.index-carousel-layout .show-item-carousel .image');
let video_home_page = document.querySelector('#video-home-page')
let show_name_movie = document.querySelector('.index-carousel-layout .show-item-carousel .video-name h1');
let button_show_single_movie = document.querySelector('.index-carousel-layout .show-item-carousel .button-show-single-movie');
let date_silder_index_page = document.querySelector('.index-carousel-layout .show-item-carousel .date span');
let link_movie_index_slider = document.querySelector('.index-carousel-layout .show-item-carousel .button-show-single-movie a');
let circle_item_defualt;

function filter_blur_all_items() {
    document.querySelectorAll('.index-carousel-layout .carousel-circle-right .items-movie-layout .items').forEach((ciclegraph) => {
        let circles = ciclegraph.querySelectorAll('.item')
        for (let i = 0; i < circles.length; i++) {
            circles[i].style.filter = "blur(10px)"
        }
    })
}

window.addEventListener('resize', () => {
    if (window.innerWidth > 856) {
        if (document.querySelectorAll('.index-carousel-layout .carousel-circle-right .items-movie-layout .items')) {
            document.querySelectorAll('.index-carousel-layout .carousel-circle-right .items-movie-layout .items').forEach((ciclegraph) => {
                let circles = ciclegraph.querySelectorAll('.item')
                let angle = 240 - 90, dangle = 360 / circles.length
                for (let i = 0; i < circles.length; ++i) {
                    let circle = circles[i]
                    angle += dangle
                    circle.style.transform = `rotate(${angle - dangle}deg) translate(${ciclegraph.clientWidth / 2}px) rotate(-${angle}deg)`
                }
            })
        }
    }
    else {
        if (items_carousel_circle) {
            items_carousel_circle.forEach((item => {
                item.addEventListener('click', () => showItemInformationFunc(item));
            }))
        }
    }
})

function circle_slider() {

    document.querySelectorAll('.index-carousel-layout .carousel-circle-right .items-movie-layout .items').forEach((ciclegraph) => {
        let circles = ciclegraph.querySelectorAll('.item')
        let angle = 240 - 90, dangle = 360 / circles.length
        for (let i = 0; i < circles.length; ++i) {
            let circle = circles[i]
            angle += dangle
            circle.style.transform = `rotate(${angle - dangle}deg) translate(${ciclegraph.clientWidth / 2}px) rotate(-${angle}deg)`
        }


        let button_next_item = document.querySelector('.button-next-item');
        let button_prev_item = document.querySelector('.button-prev-item');
        let parent_items = document.querySelector('.index-carousel-layout .carousel-circle-right .items-movie-layout .items');
        let items_of_slider = parent_items.children;
        let deg_rotate_default = 360 / parent_items.children.length;
        let count = 0;


        for (let i = 0; i < parent_items.children.length; i++) {
            if (parent_items.children[i].classList.contains('active')) {
                circle_item_defualt = parent_items.children[i];
            }
        }

        filter_blur_all_items()

        circle_item_defualt.style.filter = "blur(0px)"
        parent_items.children[parent_items.children.length - 1].style.filter = "blur(0px)";
        circle_item_defualt.nextElementSibling.style.filter = "blur(0px)"



        button_next_item.addEventListener('click', () => {
            let circle;
            count--;

            parent_items.style.transform = `rotate(${deg_rotate_default + count * deg_rotate_default}deg)`
            for (let i = 0; i < items_of_slider.length; i++) {
                items_of_slider[i].firstElementChild.firstElementChild.style.transform = `rotate(${deg_rotate_default - (count + 1) * deg_rotate_default}deg)`
            }
            for (let i = 0; i < parent_items.children.length; i++) {
                if (parent_items.children[i].classList.contains('active')) {
                    circle = parent_items.children[i];
                }
            }

            if (circle.nextElementSibling) {
                circle.nextElementSibling.classList.add('active');

                filter_blur_all_items()
                circle.style.filter = "blur(0px)"
                if (circle.nextElementSibling === parent_items.children[0]) {
                    parent_items.children[parent_items.children.length - 1].style.filter = "blur(0px)"
                }
                else if (circle.nextElementSibling === parent_items.children[parent_items.children.length - 1]) {
                    parent_items.children[0].style.filter = "blur(0px)"
                }
                else {
                    circle.nextElementSibling.nextElementSibling.style.filter = "blur(0px)"
                }

                circle.classList.remove('active')
                let src_image = circle.nextElementSibling.getAttribute('data-main-image');
                let name_movie = circle.nextElementSibling.firstElementChild.firstElementChild.firstElementChild.nextElementSibling.firstElementChild.innerText;
                let date_movie = circle.nextElementSibling.getAttribute('data-date');
                let link_movie = circle.nextElementSibling.getAttribute('data-link');
                let video_movie = circle.nextElementSibling.getAttribute('data-video');
                let en_name_movie = circle.nextElementSibling.getAttribute('data-en-name');

                box_darks.forEach(box_dark => {
                    box_dark.classList.add('active');
                })
                button_show_single_movie.classList.remove('show')
                setTimeout(() => {

                    if (src_image) {
                        big_image_show.children[1].src = src_image;
                    }
                    if (name_movie) {
                        show_name_movie.innerText = name_movie;
                    }
                    if (date_movie) {
                        date_silder_index_page.innerText = date_movie
                    }
                    if (link_movie) {
                        link_movie_index_slider.href = link_movie;
                        circle.nextElementSibling.firstElementChild.href= link_movie;
                    }
                    if (video_movie) {
                        video_home_page.src = video_movie;
                    }
                    if (en_name_movie) {
                        $("div.video-name p").text(en_name_movie);
                    }
                    else {
                        video_home_page.src = "";
                    }


                    big_image_show.children[1].addEventListener('load', () => {
                        box_darks.forEach(box_dark => {
                            box_dark.classList.remove('active');
                        })
                        setTimeout(() => {
                            button_show_single_movie.classList.add('show')
                        }, 1000)
                    })
                    video_home_page.addEventListener('load', () => {
                        box_darks.forEach(box_dark => {
                            box_dark.classList.remove('active');
                        })
                        setTimeout(() => {
                            button_show_single_movie.classList.add('show')
                        }, 1000)
                    })

                }, 1000)
            }
            else {
                parent_items.children[0].classList.add('active');

                filter_blur_all_items()
                circle.style.filter = "blur(0px)"
                if (circle.nextElementSibling === parent_items.children[0]) {
                    parent_items.children[parent_items.children.length - 1].style.filter = "blur(0px)"
                }
                else if (circle.nextElementSibling === parent_items.children[parent_items.children.length - 1]) {
                    parent_items.children[0].style.filter = "blur(0px)"
                }
                else {
                    parent_items.children[0].nextElementSibling.style.filter = "blur(0px)"
                }


                circle.classList.remove('active')

                let src_image = parent_items.children[0].getAttribute('data-main-image');
                let name_movie = parent_items.children[0].firstElementChild.firstElementChild.firstElementChild.nextElementSibling.firstElementChild.innerText;
                let date_movie = parent_items.children[0].getAttribute('data-date');
                let link_movie = parent_items.children[0].getAttribute('data-link');
                let video_movie = parent_items.children[0].getAttribute('data-video');
                let en_name_movie = parent_items.children[0].getAttribute('data-en-name');

                box_darks.forEach(box_dark => {
                    box_dark.classList.add('active');
                })
                button_show_single_movie.classList.remove('show')
                setTimeout(() => {

                    if (src_image) {
                        big_image_show.children[1].src = src_image;
                    }
                    if (name_movie) {
                        show_name_movie.innerText = name_movie;
                    }
                    if (date_movie) {
                        date_silder_index_page.innerText = date_movie
                    }
                    if (link_movie) {
                        link_movie_index_slider.href = link_movie;
                        parent_items.children[0].firstElementChild.href = link_movie;
                    }
                    if (video_movie) {
                        video_home_page.src = video_movie;
                    }
                    if (en_name_movie) {
                        $("div.video-name p").text(en_name_movie);
                    }
                    else {
                        video_home_page.src = "";
                    }


                    big_image_show.children[1].addEventListener('load', () => {
                        box_darks.forEach(box_dark => {
                            box_dark.classList.remove('active');
                        })
                        setTimeout(() => {
                            button_show_single_movie.classList.add('show')
                        }, 1000)
                    })
                    video_home_page.addEventListener('load', () => {
                        box_darks.forEach(box_dark => {
                            box_dark.classList.remove('active');
                        })
                        setTimeout(() => {
                            button_show_single_movie.classList.add('show')
                        }, 1000)
                    })
                }, 1000)
            }

        })



        button_prev_item.addEventListener('click', () => {
            let circle;
            count++;
            parent_items.style.transform = `rotate(${deg_rotate_default + count * deg_rotate_default}deg)`
            for (let i = 0; i < items_of_slider.length; i++) {
                items_of_slider[i].firstElementChild.firstElementChild.style.transform = `rotate(${deg_rotate_default - (count + 1) * deg_rotate_default}deg)`
            }

            for (let i = 0; i < parent_items.children.length; i++) {
                if (parent_items.children[i].classList.contains('active')) {
                    circle = parent_items.children[i];
                }
            }




            if (circle.previousElementSibling) {
                circle.previousElementSibling.classList.add('active');

                filter_blur_all_items()

                circle.style.filter = "blur(0px)"
                if (circle.previousElementSibling === parent_items.children[0]) {
                    parent_items.children[parent_items.children.length - 1].style.filter = "blur(0px)"

                }
                else if (circle.previousElementSibling === parent_items.children[parent_items.children.length - 1]) {
                    parent_items.children[0].style.filter = "blur(0px)"
                    console.log(parent_items.children[0])
                }

                else {
                    circle.previousElementSibling.previousElementSibling.style.filter = "blur(0px)"
                }


                circle.classList.remove('active')
                let src_image = circle.previousElementSibling.getAttribute('data-main-image');
                let name_movie = circle.previousElementSibling.firstElementChild.firstElementChild.firstElementChild.nextElementSibling.firstElementChild.innerText;
                let date_movie = circle.previousElementSibling.getAttribute('data-date');
                let link_movie = circle.previousElementSibling.getAttribute('data-link');
                let video_movie = circle.previousElementSibling.getAttribute('data-video');
                let en_name_movie = circle.previousElementSibling.getAttribute('data-en-name');

                box_darks.forEach(box_dark => {
                    box_dark.classList.add('active');
                })
                button_show_single_movie.classList.remove('show')
                setTimeout(() => {

                    if (src_image) {
                        big_image_show.children[1].src = src_image;
                    }
                    if (name_movie) {
                        show_name_movie.innerText = name_movie;
                    }
                    if (date_movie) {
                        date_silder_index_page.innerText = date_movie
                    }
                    if (link_movie) {
                        link_movie_index_slider.href = link_movie;
                        circle.previousElementSibling.firstElementChild.href = link_movie;
                    }
                    if (en_name_movie) {
                        $("div.video-name p").text(en_name_movie);
                    }
                    if (video_movie) {
                        video_home_page.src = video_movie;
                    }
                    else {
                        video_home_page.src = "";
                    }

                    big_image_show.children[1].addEventListener('load', () => {
                        box_darks.forEach(box_dark => {
                            box_dark.classList.remove('active');
                        })
                        setTimeout(() => {
                            button_show_single_movie.classList.add('show')
                        }, 1000)
                    })
                    video_home_page.addEventListener('load', () => {
                        box_darks.forEach(box_dark => {
                            box_dark.classList.remove('active');
                        })
                        setTimeout(() => {
                            button_show_single_movie.classList.add('show')
                        }, 1000)
                    })
                }, 1000)
            }
            else {
                parent_items.children[parent_items.children.length - 1].classList.add('active');

                filter_blur_all_items()

                circle.style.filter = "blur(0px)"
                if (circle.previousElementSibling === parent_items.children[0]) {
                    parent_items.children[parent_items.children.length - 2].style.filter = "blur(0px)"

                }
                else if (circle.previousElementSibling === parent_items.children[parent_items.children.length - 1]) {
                    parent_items.children[0].style.filter = "blur(0px)"
                    console.log(parent_items.children[0])
                }

                else {
                    parent_items.children[parent_items.children.length - 1].previousElementSibling.style.filter = "blur(0px)"
                }

                circle.classList.remove('active')
                let src_image = parent_items.children[parent_items.children.length - 1].getAttribute('data-main-image');
                let name_movie = parent_items.children[parent_items.children.length - 1].firstElementChild.firstElementChild.firstElementChild.nextElementSibling.firstElementChild.innerText;
                let date_movie = parent_items.children[parent_items.children.length - 1].getAttribute('data-date');
                let link_movie = parent_items.children[parent_items.children.length - 1].getAttribute('data-link');
                let video_movie = parent_items.children[parent_items.children.length - 1].getAttribute('data-video');
                let en_name_movie = parent_items.children[parent_items.children.length - 1].getAttribute('data-en-name');

                box_darks.forEach(box_dark => {
                    box_dark.classList.add('active');
                })
                button_show_single_movie.classList.remove('show')
                setTimeout(() => {

                    if (src_image) {
                        big_image_show.children[1].src = src_image;
                    }
                    if (name_movie) {
                        show_name_movie.innerText = name_movie;
                    }
                    if (date_movie) {
                        date_silder_index_page.innerText = date_movie
                    }
                    if (link_movie) {
                        link_movie_index_slider.href = link_movie;
                        parent_items.children[parent_items.children.length - 1].firstElementChild.href = link_movie;
                    }
                    if (video_movie) {
                        video_home_page.src = video_movie;
                    }
                    if (en_name_movie) {
                        $("div.video-name p").text(en_name_movie);
                    }
                    else {
                        video_home_page.src = "";
                    }

                    big_image_show.children[1].addEventListener('load', () => {
                        box_darks.forEach(box_dark => {
                            box_dark.classList.remove('active');
                        })
                        setTimeout(() => {
                            button_show_single_movie.classList.add('show')
                        }, 1000)
                    })
                    video_home_page.addEventListener('load', () => {
                        box_darks.forEach(box_dark => {
                            box_dark.classList.remove('active');
                        })
                        setTimeout(() => {
                            button_show_single_movie.classList.add('show')
                        }, 1000)
                    })
                }, 1000)
            }
        })

    })
}
function showItemInformationFunc(box) {
    let src_image = box.getAttribute('data-main-image');
    let name_movie = box.firstElementChild.firstElementChild.nextElementSibling.firstElementChild.innerText;
    let date_movie = box.getAttribute('data-date');
    let link_movie = box.getAttribute('data-link');
    let video_movie = box.getAttribute('data-video');
    let en_name_movie = box.getAttribute('data-en-name');

    box_darks.forEach(box_dark => {
        box_dark.classList.add('active');
    })
    items_carousel_circle.forEach(item => {
        if (item.classList.contains('active')) {
            item.classList.remove('active');
        }
    })
    box.classList.add('active')
    button_show_single_movie.classList.remove('show')
    setTimeout(() => {

        if (src_image) {
            big_image_show.children[1].src = src_image;
        }
        if (name_movie) {
            show_name_movie.innerText = name_movie;
        }
        if (date_movie) {
            date_silder_index_page.innerText = date_movie
        }
        if (link_movie) {
            link_movie_index_slider.href = link_movie;
            box.firstElementChild.href = link_movie
        }
        if (en_name_movie) {
            $("div.video-name p").text(en_name_movie);
        }
        if (video_movie) {
            video_home_page.src = video_movie;
        }
        else {
            video_home_page.src = "";
        }

        big_image_show.children[1].addEventListener('load', () => {
            box_darks.forEach(box_dark => {
                box_dark.classList.remove('active');
            })
            setTimeout(() => {
                button_show_single_movie.classList.add('show')
            }, 1000)
        })
        video_home_page.addEventListener('load', () => {
            box_darks.forEach(box_dark => {
                box_dark.classList.remove('active');
            })
            setTimeout(() => {
                button_show_single_movie.classList.add('show')
            }, 1000)
        })
    }, 1000)
}

if (document.querySelector('.index-carousel-layout .carousel-circle-right .items-movie-layout .items')) {
    items_carousel_circle.forEach(item => {
        if (item.classList.contains('active')) {
            let src_image = item.getAttribute('data-main-image');
            let name_movie = item.firstElementChild.firstElementChild.firstElementChild.nextElementSibling.firstElementChild.innerText;
            let date_movie = item.getAttribute('data-date');
            let link_movie = item.getAttribute('data-link');
            let video_movie = item.getAttribute('data-video');
            let en_name_movie = item.getAttribute('data-en-name');

            if (src_image) {
                big_image_show.children[1].src = src_image;
            }
            if (name_movie) {
                show_name_movie.innerText = name_movie;
            }
            if (date_movie) {
                date_silder_index_page.innerText = date_movie
            }
            if (link_movie) {
                link_movie_index_slider.href = link_movie;
                item.firstElementChild.href = link_movie;
            }
            if (en_name_movie) {
                $("div.video-name p").text(en_name_movie);
            }
            if (video_movie) {
                video_home_page.src = video_movie;
            }
        }
        setTimeout(() => {
            let height_image_slider = document.querySelector('.index-carousel-layout .show-item-carousel .image img').clientHeight;
            let height_main_box_page = document.querySelector('main').clientHeight;
            let height_video_home_page = video_home_page.clientHeight;

            if (height_image_slider <= height_main_box_page) {
                document.querySelector('.index-carousel-layout .show-item-carousel .image img').classList.add('responaisive-image');
            }
            if (height_video_home_page <= height_main_box_page) {
                video_home_page.classList.add('responaisive-image')
            }
            if (document.querySelector('.index-carousel-layout .show-item-carousel .image img').clientWidth < window.innerWidth) {
                document.querySelector('.index-carousel-layout .show-item-carousel .image img').classList.remove('responaisive-image');
            }
            if (video_home_page.clientWidth < window.innerWidth) {
                video_home_page.classList.remove('responaisive-image')
            }
        }, 100)

    })
    if (window.innerWidth > 856) {
        circle_slider()
    }

    else {
        if (items_carousel_circle) {
            items_carousel_circle.forEach((item => {
                item.addEventListener('click', () => showItemInformationFunc(item));
            }))
        }
    }

    window.addEventListener('resize', () => {
        let height_image_slider = document.querySelector('.index-carousel-layout .show-item-carousel .image img').clientHeight;
        let height_main_box_page = document.querySelector('main').clientHeight;
        let height_video_home_page = video_home_page.clientHeight;


        if (height_image_slider <= height_main_box_page) {
            document.querySelector('.index-carousel-layout .show-item-carousel .image img').classList.add('responaisive-image');
        }
        if (height_video_home_page <= height_main_box_page) {
            video_home_page.classList.add('responaisive-image')
        }
        if (document.querySelector('.index-carousel-layout .show-item-carousel .image img').clientWidth < window.innerWidth) {
            document.querySelector('.index-carousel-layout .show-item-carousel .image img').classList.remove('responaisive-image');
        }
        if (video_home_page.clientWidth < window.innerWidth) {
            video_home_page.classList.remove('responaisive-image')
        }

        // if (window.innerWidth > 856) {
        //     circle_slider()
        // }
        // else {
        //     if (items_carousel_circle) {
        //         items_carousel_circle.forEach((item => {
        //             item.addEventListener('click', () => showItemInformationFunc(item));
        //         }))

        //     }

        // }
    })

}



/* aboutus page */

let height_image = document.querySelector('.aboutus-page-main .aboutus-body .image');
if (height_image) {
    height_image.nextElementSibling.style.height = `${height_image.clientHeight}px`;
    console.log(`${height_image.clientHeight} px`)
}

/* services page */

if (document.querySelector('.services-item-slider')) {
    $(document).ready(function () {
        $('.services-item-slider').owlCarousel({
            loop: true,
            nav: true,
            responsiveClass: true,
            margin: 24,
            rtl: true,
            responsive: {
                0: {
                    items: 1,
                },
                400: {
                    items: 2,
                },
                800: {
                    items: 3,
                },
                1000: {
                    items: 4,
                },
                1300: {
                    items: 5,
                }
            }
        })
    })
    setTimeout(() => {
        let button_next_services_slider = document.querySelector('.services-item-slider .owl-next');
        let button_prev_services_slider = document.querySelector('.services-item-slider .owl-prev');


        if (button_next_services_slider && button_prev_services_slider) {
            let div_insert_buttons_slider = document.querySelector('.services-header .button-slider-services');
            button_next_services_slider.innerHTML = "";
            button_prev_services_slider.innerHTML = "";


            div_insert_buttons_slider.appendChild(button_prev_services_slider)
            div_insert_buttons_slider.appendChild(button_next_services_slider)
        }
    }, 50)
}

/* contactus page */

let form_layout_contactus = document.querySelector('.contactus-body .contactus-form');

if (document.querySelectorAll('.input-number')) {
    let input_numbers = document.querySelectorAll('.input-number');

    input_numbers.forEach(number => {
        number.addEventListener('keyup', () => { checkValueinputs(number) })
    })
}

const checkValueinputs = (input) => {
    let value = input.value;
    if (value.match(/[0-9]*/)) {
        input.value = value;
    }
    else {
        input.value = "";
    }
}

if (form_layout_contactus) {
    let height_form_contactus = form_layout_contactus.clientHeight;

    form_layout_contactus.nextElementSibling.style.height = `${height_form_contactus}px`
}

/* news page */

if (document.querySelector('.news-carousel')) {
    $('.news-carousel').owlCarousel({
        loop: true,
        nav: true,
        responsiveClass: true,
        rtl: true,
        margin: 24,
        responsive: {
            0: {
                items: 1,
            },
            400: {
                items: 2,
            },
            600: {
                items: 3,
            },
            800: {
                items: 4,
            },
            1300: {
                items: 5,
            }
        }
    })
    setTimeout(() => {
        let button_next_news_slider = document.querySelector('.news-carousel .owl-next');
        let button_prev_news_slider = document.querySelector('.news-carousel .owl-prev');
        let button_box_slider_news = document.querySelector('.news-header .button-slider-news');

        if (button_next_news_slider && button_prev_news_slider) {
            button_box_slider_news.appendChild(button_prev_news_slider);
            button_box_slider_news.appendChild(button_next_news_slider);
        }
    }, 50)
}


/* single-photo */

let image_single_layout = document.querySelector('.single-body .image-layout');
let video_single_layout = document.querySelector('.single-body .video-layout');

if (image_single_layout) {
    let height_single_image = image_single_layout.clientHeight;

    image_single_layout.nextElementSibling.style.height = `${height_single_image}px`
}



/* single-video */

let button_show_popup = document.querySelector('.single-body .video-layout .video .icon-video');
let button_close_popup = document.querySelector('.popup-video-layout .popup-video .button-close-popup')
let top_site = document.querySelector('.top-site');
let popup_layout = document.querySelector('.popup-video-layout');

if (video_single_layout) {
    let height_single_video = video_single_layout.clientHeight;

    video_single_layout.nextElementSibling.style.height = `${height_single_video}px`
}


if (button_show_popup) {
    button_show_popup.addEventListener('click', () => {
        setTimeout(() => {
            top_site.classList.add('active');
            popup_layout.classList.add('active');
            setTimeout(() => {
                if (popup_layout.classList.contains('active')) {
                    window.addEventListener('click', (e) => {
                        if (!e.target.classList.contains('child-layout') && !e.target.parentElement.classList.contains('child-layout') && !e.target.parentElement.parentElement.classList.contains('child-layout')) {
                            document.querySelectorAll('.popup-video-layout, .popup-photo-layout').forEach(popup => {
                                if (popup.classList.contains('active')) {
                                    popup.classList.remove('active')
                                }
                            })

                            icon_play_video.style.display = "flex";
                            video_popup.pause();
                            video_popup.currentTime = 0;
                            video_popup.style.display = "none";
                            image_popup.style.display = "block";
                            top_site_single.classList.remove('active')
                        }
                    })
                }

            }, 10)
        },10)

    })
    button_close_popup.addEventListener('click', () => {
        top_site.classList.remove('active');
        popup_layout.classList.remove('active');

        icon_play_video.style.display = "flex";
        video_popup.pause();
        video_popup.currentTime = 0;
        video_popup.style.display = "none";
        image_popup.style.display = "block";
    })
}


/* asaar page */

if (document.querySelector('.asaar-carousel')) {
    $('.asaar-carousel').owlCarousel({
        loop: true,
        nav: true,
        responsiveClass: true,
        rtl: true,
        margin: 24,
        responsive: {
            0: {
                items: 2,
            },
            400: {
                items: 4,
            },
            600: {
                items: 5,
            },
            800: {
                items: 6,
            },
            1300: {
                items: 7,
            }
        }
    })

    setTimeout(() => {
        let button_next_asaar_slider = document.querySelector('.asaar-carousel .owl-next');
        let button_prev_asaar_slider = document.querySelector('.asaar-carousel .owl-prev');
        let button_box_slider_asaar = document.querySelector('.asaar-header .button-slider-asaar');

        if (button_next_asaar_slider && button_prev_asaar_slider) {
            button_box_slider_asaar.appendChild(button_prev_asaar_slider);
            button_box_slider_asaar.appendChild(button_next_asaar_slider);
        }
    }, 50)
}

/* single-asaar page */

let button_show_popup_single_asaar = document.querySelector('.single-asaar-body .photo-layout .photo img');
let button_close_popup_single_asaar = document.querySelector('.popup-photo-layout .popup-photo .button-close-popup')
let popup_single_asaar_layout = document.querySelector('.popup-photo-layout');
let single_asaar_photo_layout = document.querySelector('.single-asaar-body .photo-layout');


if (single_asaar_photo_layout) {
    let height_single_photo = single_asaar_photo_layout.clientHeight;

    single_asaar_photo_layout.nextElementSibling.style.height = `${height_single_photo}px`
}


if (button_show_popup_single_asaar) {
    button_show_popup_single_asaar.addEventListener('click', () => {
        setTimeout(() => {
            top_site.classList.add('active');
            popup_single_asaar_layout.classList.add('active');
            setTimeout(() => {
                if (popup_single_asaar_layout.classList.contains('active')) {
                    window.addEventListener('click', (e) => {
                        if (!e.target.classList.contains('child-layout') && !e.target.parentElement.classList.contains('child-layout')) {
                            popup_single_asaar_layout.classList.remove('active');
                            top_site.classList.remove('active');
                        }
                    })
                }

            }, 10)
        },10)
    })
    button_close_popup_single_asaar.addEventListener('click', () => {
        top_site.classList.remove('active');
        popup_single_asaar_layout.classList.remove('active');
    })
}

/* teams-winer page */

if (document.querySelector('.team-winner-carousel')) {
    $('.team-winner-carousel').owlCarousel({
        loop: true,
        nav: true,
        responsiveClass: true,
        rtl: true,
        margin: 24,
        responsive: {
            0: {
                items: 2,
            },
            400: {
                items: 4,
            },
            600: {
                items: 5,
            },
            800: {
                items: 6,
            },
            1300: {
                items: 7,
            }
        }
    })

    setTimeout(() => {
        let button_next_teamwinner_slider = document.querySelector('.team-winner-carousel .owl-next');
        let button_prev_teamwinner_slider = document.querySelector('.team-winner-carousel .owl-prev');
        let button_box_teamwinner_slider_asaar = document.querySelector('.team-winner-header .button-slider-team-winner');

        if (button_next_teamwinner_slider && button_prev_teamwinner_slider) {
            button_box_teamwinner_slider_asaar.appendChild(button_prev_teamwinner_slider);
            button_box_teamwinner_slider_asaar.appendChild(button_next_teamwinner_slider);
        }
    }, 50)
}


/* navbar */

let parent_list_navbar = document.querySelector('header nav > ul');
let button_show_menu = document.querySelector('.button-open-menu');
let cover_glass_show_nenu = document.querySelector('.cover-glass-show-menu');
let button_close_menu = document.querySelectorAll('.button-close-menu');
let list_menu = document.querySelectorAll('header nav > ul li');
let list_submenu = document.querySelectorAll('header nav > ul li ul');
let height_submenus = [];
let elements_have_submenu = [];

if (parent_list_navbar && button_show_menu) {
    button_show_menu.addEventListener('click', () => { toggleMenu('SHOW') })
    button_close_menu.forEach(close => {
        close.addEventListener('click', () => { toggleMenu('HIDE') })
    })
    cover_glass_show_nenu.addEventListener('click', () => { toggleMenu('HIDE') })

    list_menu.forEach((list) => {
        if (list.firstElementChild.nextElementSibling) {
            let img_ele = document.createElement('img');
            img_ele.src = './assets/icon/bottom.svg';
            img_ele.classList.add('button-show-submenu');
            list.firstElementChild.appendChild(img_ele)

            elements_have_submenu.push(list)
        }
    })


    if (window.innerWidth <= 856) {
        setTimeout(() => {
            list_submenu.forEach(sub => {
                height_submenus.push(sub.clientHeight);
            })
            list_submenu.forEach(sub => {
                sub.style.height = '0';
            })
        }, 50);
    }

    elements_have_submenu.forEach((list, index) => {
        list.firstElementChild.firstElementChild.addEventListener('click', (e) => { toggleSubMenu(e, list, index) })
    })
}

function toggleMenu(action) {
    switch (action) {
        case "SHOW": {
            parent_list_navbar.classList.add('active');
            cover_glass_show_nenu.classList.add('active');
            return;
        }
        case "HIDE": {
            parent_list_navbar.classList.remove('active');
            cover_glass_show_nenu.classList.remove('active');
            return;
        }
    }
}

function toggleSubMenu(e, list, index) {
    e.preventDefault();
    if (list.firstElementChild.nextElementSibling.classList.contains('active')) {
        list.firstElementChild.nextElementSibling.classList.remove('active');
        list.firstElementChild.firstElementChild.style.transform = 'rotate(90deg)';
        list.firstElementChild.nextElementSibling.style.height = `0`;
    }
    else {
        list.firstElementChild.nextElementSibling.classList.add('active');
        list.firstElementChild.firstElementChild.style.transform = 'rotate(0deg)';
        list.firstElementChild.nextElementSibling.style.height = `${height_submenus[index]}px`;
    }
}

/* sliding menu sub items  */

$(window).ready(function () {
    initMenu();
});

$("header nav > ul > li ul li").hover(function () {
    var offset = $(this).offset();
    $(".sliding-bar").offset(offset);
});

$("header nav > ul > li ul").hover(
    function () {
        $(".sliding-bar").css({ opacity: 1 });
    },
    function () {
        $(".sliding-bar").css({ opacity: 0 });
    }
);

var initMenu = function () {
    var $initElem = $("header nav > ul > li ul li:first-of-type");
    var initOffset = $initElem.offset();
    var initSize = {
        width: $initElem.css("width"),
        height: $initElem.css("height")
    };
    $(".sliding-bar").offset(initOffset).css(initSize);
};

/* js play and pause video in asar-single */

let image_popup = document.querySelector('.popup-video-layout .popup-video .child-layout > img');
let video_popup = document.querySelector('#video');
let icon_play_video = document.querySelector('.popup-video-layout .popup-video .child-layout .play-video');
let close_popup_video = document.querySelector('.popup-video-layout .popup-video .button-close-popup');


if (image_popup) {
    if (video_popup) {
        setTimeout(() => {
            video_popup.style.display = "none";
        }, 10)
        video_popup.addEventListener('click', () => {
            icon_play_video.style.display = "flex";
            video_popup.style.filter = "blur(16px)"
            // video_popup.pause();
        })
        icon_play_video.addEventListener('click', () => {
            video_popup.play();
            video_popup.style.display = "block";
            video_popup.style.filter = "blur(0px)"
            icon_play_video.style.display = "none";
            image_popup.style.display = "none";
        })
    }
}

let top_site_single = document.querySelector('.top-site');

if (top_site_single) {
    // top_site_single.addEventListener('click' , () => {
    //     document.querySelectorAll('.popup-video-layout, .popup-photo-layout').forEach(popup => {
    //         if(popup.classList.contains('active')){
    //             popup.classList.remove('active')
    //         }
    //     })

    // })

}
let button_show_teaser = document.querySelector('.single-asaar-body .photo-layout .button-show-teaser')

if (button_show_teaser) {
    button_show_teaser.addEventListener('click', () => {
        setTimeout(() => {
            top_site.classList.add('active');
            popup_layout.classList.add('active');
            setTimeout(() => {
                if (popup_layout.classList.contains('active')) {
                    window.addEventListener('click', (e) => {
                        if (!e.target.classList.contains('child-layout') && !e.target.parentElement.classList.contains('child-layout') && !e.target.parentElement.parentElement.classList.contains('child-layout')) {
                            document.querySelectorAll('.popup-video-layout, .popup-photo-layout').forEach(popup => {
                                if (popup.classList.contains('active')) {
                                    popup.classList.remove('active')
                                }
                            })

                            icon_play_video.style.display = "flex";
                            video_popup.pause();
                            video_popup.currentTime = 0;
                            video_popup.style.display = "none";
                            image_popup.style.display = "block";
                            top_site_single.classList.remove('active')
                        }
                    })
                }

            }, 10)
        },10)

    })
    button_close_popup.addEventListener('click', () => {
        top_site.classList.remove('active');
        popup_layout.classList.remove('active');

        icon_play_video.style.display = "flex";
        video_popup.pause();
        video_popup.currentTime = 0;
        video_popup.style.display = "none";
        image_popup.style.display = "block";
    })
}

