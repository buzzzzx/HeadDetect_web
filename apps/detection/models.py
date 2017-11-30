from django.db import models
import datetime


# Create your models here.

class PeopleCount(models.Model):
    date_join = models.DateField(default=datetime.date.today)
    time_join = models.TimeField()
    head_count = models.IntegerField()
    people_count = models.IntegerField()

    class Meta:
        ordering = ('-date_join', )
