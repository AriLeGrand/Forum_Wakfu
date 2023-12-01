from django.shortcuts import render
from django.http import HttpResponse

def read_file(filename):
    with open(filename) as f:
        return f.read()

def index(request):
    return HttpResponse(read_file("index.html"))

