<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory, QueryScopes;

    protected $fillable = [
        'province_id',
        'district_id',
        'ward_id',
        'name',
        'description'
    ];

    protected $table = 'destination';

    public function province()
    {
        //BeLongsTo: Đây là phương thức của Eloquent để thiết lập mối quan hệ "nhiều một" (many-to-one)
        return $this->belongsTo(Province::class, 'province_id', 'code');

        //Cho phép bạn liên kết một bản ghi trong bảng users với một bản ghi trong bảng UserCatalogue thông qua trường user_catalogue_id
    }

    public function district()
    {
        //BeLongsTo: Đây là phương thức của Eloquent để thiết lập mối quan hệ "nhiều một" (many-to-one)
        return $this->belongsTo(District::class, 'district_id', 'code');

        //Cho phép bạn liên kết một bản ghi trong bảng users với một bản ghi trong bảng UserCatalogue thông qua trường user_catalogue_id
    }

    public function ward()
    {
        //BeLongsTo: Đây là phương thức của Eloquent để thiết lập mối quan hệ "nhiều một" (many-to-one)
        return $this->belongsTo(Ward::class, 'ward_id', 'code');

        //Cho phép bạn liên kết một bản ghi trong bảng users với một bản ghi trong bảng UserCatalogue thông qua trường user_catalogue_id
    }


}
