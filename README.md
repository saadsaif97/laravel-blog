### Learnings from project

---

ignore unique validation in custom request

```
   'title'=> 'required|unique:posts,title,'.$this->post['id']
```

linking local storage to public folder

```
   php artisan storage:link
```

accessing the asset from storage in view

```
   <img src="{{ asset('storage/'.$post->image) }}">
```

```
restore the post using put method and not simply get method because it could be easily restored if we go to that route
```

In relations:

```
   $this->post gives us collection WHERE AS $this->post() gives us query builder
```

we can use route model binding to restore the post that is deleted already

```
   public function restore($id)
   {
      // we cannot use route model binding here because post is already deleted
      $post = Post::withTrashed()->where('id',$id)->firstOrFail();

      $post->restore();

      session()->flash('success','Post restored successfully');

      return redirect()->back();
   }
```

when I was sending $categories as compact('categories') to category index view, relationship was not working

```

public function index()
{
return view('categories.index',compact('categories'));
}

```

But changing to Categories::all() it worked.

```

public function index()
{
return view('categories.index')->with('categories',Category::all());
}

```

To use a custom middleware first register in kernal.php then use in route
or constructor function of controller (I used with only)

```
   public function __construct()
   {
      $this->middleware('verifyCategoriesCount')->only(['create','store']);
   }
```

Before copy paste in views verify

```
That no relationship from previous view comes in new view
```

When there is no category in list and you call the relation on it in trashed view,
error arises. So you have to cascade delete the relationship.

when you have to create a foreign id (category_id) in posts, categories table should be migrated before posts table
you can play with migration timestamp to play with migration order
