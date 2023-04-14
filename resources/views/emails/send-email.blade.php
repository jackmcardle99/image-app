<x-mail::message>
# IndieScene

## Hi {{$receiver->name}},

## This post has been shared with you by {{$sender}}.

### Here's more information about their post:

*Title: **{{$post->title}}**
*Body: {{$post->summary}}<br>
![alt text]({{config('app.url')}}/storage/uploads/thumbnails/{{$post->image_filename}} "thumbnail view of {{$post->title}}")

[Log in to {{config('app.name')}} to see more]({{config('app.url')}} "Log in to {{config('app.name')}} to see more")

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
