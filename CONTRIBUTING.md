# Як зрабіць свой унёсак
Мы вельмі рады, што вы чытаеце гэта, таму што нам трэба валантэры-распрацоўшчыкі, каб дапамагчы гэтаму праекту развівацца.

## Стварэнне баг-рапартаў і прапаноў
* [Прыклад афармлення бага](https://github.com/diglabby/doika_1.2/wiki/Прыклад-афармлення-бага)
* [Праца з рэквэстамі](https://github.com/diglabby/doika/wiki/Праца-з-Pull-Request)
* [Як запытаць дапамогу](https://github.com/diglabby/doika/wiki/Як-правільна-запытваць-дапамогу)


## Як пачаць распрацоўку?
1. Праглядзець статус і [роадмэп](https://github.com/diglabby/doika/wiki/Дарожная-карта) распрацоукi праекта.
2. Як разгарнуць лакальны асяродак для распрацоўкі і усталяваць сабе па [інструкцыі](https://github.com/diglabby/doika/wiki/Усталёўка-для-Распрацоўшчыкаў).

## Дадаткова можна азнаёміцца
* Праглядзець [дакументацыю](https://realtimeboard.com/app/board/o9J_k0X88dM=/). 
  - [Архiтэктура файлаў i базы](https://realtimeboard.com/app/board/o9J_k0X88dM=/?moveToWidget=3074457346027045333)
  - [Блок-схемы](https://realtimeboard.com/app/board/o9J_k0X88dM=/?moveToWidget=3074457346144718504)
  - [Спiс класаў](https://realtimeboard.com/app/board/o9J_k0X88dM=/?moveToWidget=3074457346135802429)
  - [Вiкi](https://github.com/diglabby/doika/wiki/) частка "для распрацоўшчыкаў".
  - Пры з'яўленні пытанняў і цяжкасцей запытаць у Slack бягучых удзельнікаў каманды: @fr0zen, @tyuba4, @Сёмка, @SvetaN (інвайт у канал Slack магчыма атрымаць звярнуўшыся да нас праз [форму](https://docs.google.com/forms/d/e/1FAIpQLSf3q7HMtfJly4wCrRyIlHDdAzFExSjw2vqbA62XFJHofjMqjg/viewform)).


## Кодынг-стандарт
[Кодынг-стандарт](https://github.com/diglabby/doika_1.2/wiki/Кодынг-стандарт)


## Тэставанне
Дзе можна паглядзець змены, якія адбываюцца на `develop` галіне рэпазіторыя: {NTD}!!!! - [Тэставы-дамен](http://it3donate-landing.falanster.by/doika/admin/campaigns) - лагін: demo@example.com пароль: demo

Алгарытм таго, як змены пераходзяць з рэпазіторыя на тэставы дамен.
1. Робіцца pull request.
2. Pull request мержыцца.
3. ? Усталяваны на сэрвере Jenkins забірае змены з рэпазіторыя. ?
4. ? Jenkins адаптуе канфігурацыю Laravel пад сэрвер. ?
5. Можна праглядаць змены
