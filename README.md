
1.注册界面

    a.重名验证（失去焦点）AJAX
    b.*邮箱验证，密码重复验证
    c.发送Ajax
    
2.登录界面

    a.。。。
    b.数据库密码加密/done
    c.用不同页面实现用户权限分离（可改进）
    ***
       如何不让用户通过URL访问Admin文件夹的内容？？/done(waf)
    d.登录完SESSION保存一个用户对象/done
    e.登录完跳转回登录界面
d.注册页面扩大，给输入提示留空间/done
e.ajax验证账号或密码错误


3.文章

    a.发表
    ^b.评论（js字数判断）/done
        评论回复（链接在chrome收藏夹里）/done
    c.删除、修改评论(admin)
    d.拦截敏感词（后端input.php）
    e.*上传图片
    f.搜索功能（后端已完成测试）
    g.数据库存放文章（html标签，图片用链接+img标签存放）
    ^h.分页（链接chrome收藏夹里）
    
    2019.12.18 2:15 AM:评论发表/实时显示功能完成，为了方便，只进行了二级套娃
    接下来写评论view功能
    
     2019.12.21  2:40AM 评论view
    j.2019.12.22 1:18AM:文章列表主页
    2019.12.23   11：59PM 项目崩溃，修复bug
    2019.12.25   1:40 PM 边栏、分页
    h.2019.12.26 2:38 AM :删除功能、搜索功能
    2019.12.28 翻页，管理员界面，编辑文章，上传图片，评论，边栏
    2019.12.29 3:15AM 正式版1.0.0完工
4.*聊天机器人Ajax+php+（mysql）有时间再做了，可能做成彩蛋


5.database

    a.users表
    b.messages表
    c.reply 表
    d.passage表
    
 ***前后端互动尽量使用AJAX
 ***服务端仅负责处理请求

页面说明：
  Index.html. 主页
  Blog.html			所有新闻
  Single-post.html	热门文章
  Galleries.html		相册
  About.html		个人页面
  Admin.php		管理员页面
  hollowKnight.html 查看新闻
  Search.html 搜索结果页面
  
  每一页都有边栏，用以显示用户简要信息
  
  10.24任务：blog.html 显示并分页