<?php
namespace App\Services;

use phpQuery;

class ReviewService
{
    public function getReviews($url)
    {
        $html = file_get_contents($url);

        // Создаем объект phpQuery
        $document = phpQuery::newDocument($html);

        $reviews = [];

        foreach($document->find('.business-review-view') as $div){
            //Значит, нашли отзыв
            $review=[];
            //Ищем автора
            if(count(pq($div)->find('.business-review-view__author a'))){
                $reviewAuthor=pq($div)->find('.business-review-view__author a span')[0]->text();
                $review['author']=$reviewAuthor;
            }
            if(count(pq($div)->find('.business-review-view__author meta'))){
                $reviewImage=pq($div)->find('.business-review-view__author meta')[0]->attr('content');
                $review['image']=$reviewImage;
            }
            if(count(pq($div)->find('.business-review-view__date'))){
                $reviewDate=pq($div)->find('.business-review-view__date meta')[0]->attr('content');
                $review['date']=$reviewDate;
            }
            if(count(pq($div)->find('.business-review-view__body-text'))){
                $reviewText=pq($div)->find('.business-review-view__body-text')[0]->text();
                $review['text']=$reviewText;
            }
            $reviews[]=$review;
        }

        return $reviews;
    }
}
