<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Blogs
{
    public static function getAll()
    {
        return [
            [
                "id" => 1,
                "title" => "blog 1",
                "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nisi quia voluptates deleniti nihil reprehenderit enim alias ratione facere molestias, a natus sed ullam, vel doloribus tenetur hic tempora placeat facilis neque dolor rerum magnam? Maxime cupiditate error cumque consectetur, eius hic saepe! Non necessitatibus dolores consequatur, alias similique voluptatum!
                
                
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat odio, voluptas voluptatem corporis dolorum molestias quia fugit reiciendis, incidunt quos ea totam sed placeat nulla veniam eius officiis delectus nam. Debitis mollitia voluptatem eius in alias doloribus adipisci eligendi velit omnis facere temporibus culpa dolorem error repellat enim ullam obcaecati ut vel possimus unde earum, ratione deleniti. Commodi consequuntur cupiditate, quisquam assumenda a blanditiis ut explicabo rem. Nemo unde placeat voluptatum ipsam eveniet numquam, praesentium, rem assumenda tenetur est culpa.
                
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia magni magnam asperiores quo quas dolorem nihil laborum voluptate modi maiores adipisci pariatur, animi consequatur sequi. Temporibus ratione, odio illum qui et quia esse eveniet illo.",
            ],
            [
                "id" => 2,
                "title" => "blog 2",
                "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nisi quia voluptates deleniti nihil reprehenderit enim alias ratione facere molestias, a natus sed ullam, vel doloribus tenetur hic tempora placeat facilis neque dolor rerum magnam? Maxime cupiditate error cumque consectetur, eius hic saepe! Non necessitatibus dolores consequatur, alias similique voluptatum!
                
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat odio, voluptas voluptatem corporis dolorum molestias quia fugit reiciendis, incidunt quos ea totam sed placeat nulla veniam eius officiis delectus nam. Debitis mollitia voluptatem eius in alias doloribus adipisci eligendi velit omnis facere temporibus culpa dolorem error repellat enim ullam obcaecati ut vel possimus unde earum, ratione deleniti. Commodi consequuntur cupiditate, quisquam assumenda a blanditiis ut explicabo rem. Nemo unde placeat voluptatum ipsam eveniet numquam, praesentium, rem assumenda tenetur est culpa.
                
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia magni magnam asperiores quo quas dolorem nihil laborum voluptate modi maiores adipisci pariatur, animi consequatur sequi. Temporibus ratione, odio illum qui et quia esse eveniet illo.",
            ],
            [
                "id" => 3,
                "title" => "blog 3",
                "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nisi quia voluptates deleniti nihil reprehenderit enim alias ratione facere molestias, a natus sed ullam, vel doloribus tenetur hic tempora placeat facilis neque dolor rerum magnam? Maxime cupiditate error cumque consectetur, eius hic saepe! Non necessitatibus dolores consequatur, alias similique voluptatum!
                
                
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat odio, voluptas voluptatem corporis dolorum molestias quia fugit reiciendis, incidunt quos ea totam sed placeat nulla veniam eius officiis delectus nam. Debitis mollitia voluptatem eius in alias doloribus adipisci eligendi velit omnis facere temporibus culpa dolorem error repellat enim ullam obcaecati ut vel possimus unde earum, ratione deleniti. Commodi consequuntur cupiditate, quisquam assumenda a blanditiis ut explicabo rem. Nemo unde placeat voluptatum ipsam eveniet numquam, praesentium, rem assumenda tenetur est culpa.
                
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia magni magnam asperiores quo quas dolorem nihil laborum voluptate modi maiores adipisci pariatur, animi consequatur sequi. Temporibus ratione, odio illum qui et quia esse eveniet illo.",
            ],
            [
                "id" => 4,
                "title" => "blog 4",
                "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nisi quia voluptates deleniti nihil reprehenderit enim alias ratione facere molestias, a natus sed ullam, vel doloribus tenetur hic tempora placeat facilis neque dolor rerum magnam? Maxime cupiditate error cumque consectetur, eius hic saepe! Non necessitatibus dolores consequatur, alias similique voluptatum!
                
                
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat odio, voluptas voluptatem corporis dolorum molestias quia fugit reiciendis, incidunt quos ea totam sed placeat nulla veniam eius officiis delectus nam. Debitis mollitia voluptatem eius in alias doloribus adipisci eligendi velit omnis facere temporibus culpa dolorem error repellat enim ullam obcaecati ut vel possimus unde earum, ratione deleniti. Commodi consequuntur cupiditate, quisquam assumenda a blanditiis ut explicabo rem. Nemo unde placeat voluptatum ipsam eveniet numquam, praesentium, rem assumenda tenetur est culpa.
                
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia magni magnam asperiores quo quas dolorem nihil laborum voluptate modi maiores adipisci pariatur, animi consequatur sequi. Temporibus ratione, odio illum qui et quia esse eveniet illo.",
            ],
            [
                "id" => 5,
                "title" => "blog 5",
                "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nisi quia voluptates deleniti nihil reprehenderit enim alias ratione facere molestias, a natus sed ullam, vel doloribus tenetur hic tempora placeat facilis neque dolor rerum magnam? Maxime cupiditate error cumque consectetur, eius hic saepe! Non necessitatibus dolores consequatur, alias similique voluptatum!
                
                
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat odio, voluptas voluptatem corporis dolorum molestias quia fugit reiciendis, incidunt quos ea totam sed placeat nulla veniam eius officiis delectus nam. Debitis mollitia voluptatem eius in alias doloribus adipisci eligendi velit omnis facere temporibus culpa dolorem error repellat enim ullam obcaecati ut vel possimus unde earum, ratione deleniti. Commodi consequuntur cupiditate, quisquam assumenda a blanditiis ut explicabo rem. Nemo unde placeat voluptatum ipsam eveniet numquam, praesentium, rem assumenda tenetur est culpa.
                
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia magni magnam asperiores quo quas dolorem nihil laborum voluptate modi maiores adipisci pariatur, animi consequatur sequi. Temporibus ratione, odio illum qui et quia esse eveniet illo.",
            ],
        ];
    }

    public static function getById($id)
    {
        $blogs = static::getAll();
        return Arr::first(
            $blogs,
            fn($blogs) => $blogs['id'] == $id
        );
    }
}
