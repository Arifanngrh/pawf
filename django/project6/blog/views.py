from django.shortcuts import get_object_or_404, render # update
from django.db.models import Q
from .models import Post


def post_list(request):
    posts = Post.objects.all()
    
    # Search functionality
    search_query = request.GET.get('q', '')
    if search_query:
        posts = posts.filter(
            Q(title__icontains=search_query) | 
            Q(body__icontains=search_query) |
            Q(author__username__icontains=search_query)
        )
    
    # Sorting by latest first
    posts = posts.order_by('-id')
    
    return render(request, "home.html", {"posts": posts})

# add
def post_detail(request, pk):
    post = get_object_or_404(Post, pk=pk)
    return render(request, "post_detail.html", {"post": post})
