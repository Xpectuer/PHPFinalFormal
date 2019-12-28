
/*
* generate for
* */

//查看全部文章

//分页
let $passage_list=$("#passage_list");
let $passage_list_item;

$.ajax({
    type:"GET",
    url:"services/viewPassageList.php",
    dataType:"json",
    data:"mode=ALL",
    success:function (datafeedback) {

        console.log(datafeedback);

        // let $post_template=$("#post_template2").clone();
        //
        //
        // let $template_title=$post_template.find(".card-title").find("a");
        // let $template_bulletin=$post_template.find(".card-excerpt").find("p");
        // let $template_author=$post_template.find(".author-meta");
        // let $template_time=$post_template.find(".eskimo-date-meta").find("a");
        // let $template_image=$post_template.find(".card-horizontal-right");

        $.each(datafeedback,function (index,obj) {


            //
            // $template_title.html(obj["title"]);
            // $template_title.attr("href","hollowKnight.html?id="+obj["id"]);
            //
            // $template_bulletin.html(obj["content"]);
            // $template_bulletin.attr("href","hollowKnight.html?id="+obj["id"]);
            //
            //
            // $template_author.html(obj["UserName"]);
            // $template_author.attr("href","hollowKnight.html?id="+obj["id"]);
            //
            // $template_time.html(obj["time"]);
            // $template_time.attr("href","hollowKnight.html?id="+obj["id"]);
            //
            //
            // $template_image.attr("data-img","../lib/uploads/2019/12/"+obj["image"]);
            // $template_image.data("img","../lib/uploads/2019/12/"+obj["image"]);
            //
            // $template_image.find("a").attr("href","hollowKnight.html?id="+obj["id"]);
            //
            //
            // $post_template.appendTo("#passage_list");



            $passage_list_item="<div class=\"card card-horizontal\" id=\"post_template2\">\n" +
                "                    <div class=\"card-body\">\n" +
                "                        <div class=\"card-horizontal-left\">\n" +
                "                            <h3 class=\"card-title\"><a href=\"hollowKnight.html?id="+obj["id"]+"\">"+obj["title"]+"</a></h3>\n" +
                "                            <div class=\"card-excerpt\">\n" +
                "                                <p>"+obj["content"]+"</p>\n" +
                "                            </div>\n" +
                "                            <div class=\"card-horizontal-meta\">\n" +
                "                                <div class=\"eskimo-author-meta\">\n" +
                "                                    By <a class=\"author-meta\" href=\"hollowKnight.html?id="+obj["id"]+"\">"+obj["UserName"]+"</a>\n" +
                "                                </div>\n" +
                "                                <div class=\"eskimo-date-meta\">\n" +
                "                                    <a href=\"single-post.html\">"+obj["time"]+"</a>\n" +
                "                                </div>\n" +
                "                                <div class=\"eskimo-reading-meta\">3 min read</div>\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "                        <div class=\"card-horizontal-right\" >\n" +
                "                            <a class=\"card-featured-img\" href=\"hollowKnight.html?id="+obj["id"]+"\"><img src=\'../lib/uploads/2019/12/"+obj["image"]+"\'></a>\n" +
                "                        </div>\n" +
                "                    </div>\n" +
                "                </div>";

            $passage_list.append($passage_list_item);
        })
    }



});