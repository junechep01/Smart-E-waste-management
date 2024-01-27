
from django.urls import path
from . import views
from .views import PostListView,PostDetailView,PostCreateView,PostUpdateView,PostDeleteView

urlpatterns = [
    path('', views.home, name='project-home'),
    path('about/', views.about, name='project-about'),
    path('contacts/', views.contacts, name='project-contacts'),
    path('recycling/', views.recycling, name='project-recycling'),
    path('talk/', PostListView.as_view(), name='project-talk'),
    path('post/<int:pk>/', PostDetailView.as_view(), name='post-detail'),
    path('post/new/', PostCreateView.as_view(), name='post-create'),
    path('post/<int:pk>/update/', PostUpdateView.as_view(), name='post-update'),
    path('post/<int:pk>/delete/', PostDeleteView.as_view(), name='post-delete'),
]