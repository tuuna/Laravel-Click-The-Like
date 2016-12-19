# Laravel-Click-The-Like
在Laravel中，使用Ajax，Redis，Amaze UI实现点赞关注功能

## Redis 
使用 `redis` 代替 数据库的一部分功能。

- 主要思路是设计`Ajax`计数器，当用户点赞之后，计数器加一，把数据提交到对应的后台控制器。
- 然后控制器中执行`Redis`相关操作，并且做缓存
- 这时候的数字先放入队列中，后台进程循环获取
