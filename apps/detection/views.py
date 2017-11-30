import datetime

from django.shortcuts import render

from .models import PeopleCount


# Create your views here.

def index(request):
    return render(request, 'index.html')


def shitang_a(request):
    today = datetime.date.today().strftime("%Y-%m-%d")
    pcs = PeopleCount.objects.all().order_by('time_join').filter(date_join=today)[:15]

    return render(request, 'shitang/first_cantee_a_entrance.html', {'datas': pcs})


def map(request):
    return render(request, 'map/map_info.html')
