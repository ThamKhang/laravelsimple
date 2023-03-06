<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = ['name', 'author', 'gender'];
    public $timestamps = true;
    protected $hidden = ['created_at', 'updated_at'];
    public function classs (){
        return $this->belongsTo(Classs::class, 'id_class');
    }
    public function getBooksData($gender, $id_class)
    {
        $query = $this->with('classs');
        if ($gender != 'all'){
            $query->where('gender', $gender);
        }
        if ($id_class != 'all') {
            $query->whereHas('classs', function ($query) use ($id_class) {
                $query->where('id_class', $id_class);
            });
        }
        $books = $query->paginate(5);
        return [
            'success' => [
                'current_page' => $books->currentPage(),
                'total_pages' => $books->lastPage(),
                'data' => $books->items()
            ],
        ];
    }
    public function postBooksData($name, $author, $gender, $id_class)
    {
        $books = new Books();
        $books->name = $name;
        $books->author = $author;
        $books->gender = $gender;
        $books->id_class = $id_class;
        $books->save();

        return $books;
    }
}
