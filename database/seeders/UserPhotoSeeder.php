<?php

namespace Database\Seeders;

use App\Models\UserPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new UserPhoto();
        $user->url1 = 'https://sw1-proyects.s3.amazonaws.com/user8/3wkRO8X0aLIWLTGWD7fppSp6jXmu3e22g5U6HT1j.jpg';
        $user->url2 = 'https://sw1-proyects.s3.amazonaws.com/user8/kiC5mZj7enRYbhKI6EB6wqtWJJeCUeO95pZPNxGA.jpg';
        $user->url3 = 'https://sw1-proyects.s3.amazonaws.com/user8/sUXwpEXW7ZDnTVmsXFsHmQEDFD9oOOGF9yLkON4O.jpg';
        $user->idUser=1;
        $user->save();


        $user=new UserPhoto();
        $user->url1 = 'https://m.media-amazon.com/images/M/MV5BOTBhMTI1NDQtYmU4Mi00MjYyLTk5MjEtZjllMDkxOWY3ZGRhXkEyXkFqcGdeQXVyNzI1NzMxNzM@._V1_.jpg';
        $user->url2 = 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Johnny_Depp_%28July_2009%29_2.jpg/200px-Johnny_Depp_%28July_2009%29_2.jpg';
        $user->url3 = 'https://www.musicmundial.com/wp-content/uploads/2022/09/672532.jpg';
        $user->idUser=2;
        $user->save();

        /* $user=new UserPhoto();
        $user->url1 = 'https://es.web.img3.acsta.net/c_310_420/pictures/15/05/15/16/30/134942.jpg';
        $user->url2 = 'https://upload.wikimedia.org/wikipedia/commons/3/31/Emma_Stone_at_Maniac_UK_premiere_%28cropped%29.jpg';
        $user->url3 = 'https://media.vogue.es/photos/5cc75fe215b8b0215fb49e53/master/w_1600%2Cc_limit/vogue_news_285430822.jpg';
        $user->idUser=2;
        $user->save(); */
    }
}
