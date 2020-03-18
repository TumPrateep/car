<script>
    $(document).ready(function () {

        $.get(base_url + "service/banner/getAllNews", {},
            function(data, textStatus, jqXHR) {
                $.each(data.data, function(i, v) {
                    let html = '<div class="col-lg-4 col-md-6">'
                        + '<div class="card">'
                            + '<a href="'+base_url+'user/news/detail/'+v.news_id+'">'
                                + '<img src="'+base_url+'public/image/news/'+v.news_picture+'" class="card-img-top">'
                                + '<div class="card-body">'
                                    + '<strong class="card-title text-orange">'+v.news_title+'</strong>'
                                + '</div>'
                            + '</a>'
                        + '</div>'
                    + '</div>';
                    $("#news-all").append(html);
                });
            }
        );

    });
</script>