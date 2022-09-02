<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            [
                'country_id' => 5,
                'category_id' => 1,
                'source_id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author1',
                'url' => 'aaa.com',
                'image' => null,
                'published_at' => '2022-08-01 00:00:00',
            ],
            [
                'country_id' => 10,
                'category_id' => 2,
                'source_id' => 2,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author2',
                'url' => 'bbb.com',
                'image' => 'dummy.jpg',
                'published_at' => '2022-08-02 00:00:00',
            ],
            [   'country_id' => 15,
                'category_id' => 3,
                'source_id' => 3,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author3',
                'url' => 'ccc.com',
                'image' => null,
                'published_at' => '2022-08-03 00:00:00',
            ],
            [   'country_id' => 20,
                'category_id' => 4,
                'source_id' => 4,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author4',
                'url' => 'ddd.com',
                'image' => 'dummy.jpg',
                'published_at' => '2022-08-04 00:00:00',
            ],
            [   'country_id' => 25,
                'category_id' => 5,
                'source_id' => 5,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author5',
                'url' => 'eee.com',
                'image' => 'dummy.jpg',
                'published_at' => '2022-08-05 00:00:00',
            ],
            [   'country_id' => 30,
                'category_id' => 6,
                'source_id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author6',
                'url' => 'fff.com',
                'image' => 'dummy.jpg',
                'published_at' => '2022-08-06 00:00:00',
            ],
            [   'country_id' => 35,
                'category_id' => 1,
                'source_id' => 2,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author7',
                'url' => 'ggg.com',
                'image' => 'dummy.jpg',
                'published_at' => '2022-08-07 00:00:00',
            ],
            [   'country_id' => 40,
                'category_id' => 2,
                'source_id' => 3,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit magnam totam debitis tempora magni omnis nulla ipsam, provident nesciunt.',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, sapiente impedit explicabo eaque est vitae quaerat quidem dignissimos voluptatum inventore accusamus illum aliquid architecto, culpa blanditiis voluptatibus ratione aut quisquam neque corporis, totam tempora. Nisi modi dicta autem perspiciatis quis non quasi consequatur incidunt ipsam omnis quisquam, magni voluptates aperiam libero quas sint nemo eum culpa earum nobis. Harum totam amet sit eius veniam corrupti consectetur provident, ut animi aut enim consequuntur non accusamus deserunt excepturi quos officia blanditiis explicabo facere nostrum voluptates. Dolore architecto quibusdam quam animi officiis hic dicta voluptas at, pariatur nobis voluptate, nihil est eos eius.',
                'author' => 'author8',
                'url' => 'hhh.com',
                'image' => 'dummy.jpg',
                'published_at' => '2022-08-07 00:00:00',
            ],
        ]);
    }
}
