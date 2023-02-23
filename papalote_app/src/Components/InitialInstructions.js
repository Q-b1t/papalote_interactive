import React, { useState } from 'react';
import {
  Carousel,
  CarouselItem,
  CarouselControl,
  CarouselIndicators,
  CarouselCaption,
} from 'reactstrap';

const items = [
  {
    id: 1,
    altText: 'Estamos para ayudarte.',
    caption: 'Si te llegas a perder, puedes perdirle ayuda a cualquiera que tenga el uniforme del Papalote.',
  },
  {
    id: 2,
    altText: '¡Completa el recorrido!',
    caption: '¡Si visitas todos los puntos que hemos marcado, podras ganar geniales premios al final del recorrido!',
  },
  {
    id: 3,
    altText: '¡Comenzamos!',
    caption: 'Por favor, dirigete al primer sitio que marca tu libro de retos.',
  },
];

function InitialInstructions(props) {
  const [activeIndex, setActiveIndex] = useState(0);
  const [animating, setAnimating] = useState(false);

  const next = () => {
    if (animating) return;
    const nextIndex = activeIndex === items.length - 1 ? 0 : activeIndex + 1;
    setActiveIndex(nextIndex);
  };

  const previous = () => {
    if (animating) return;
    const nextIndex = activeIndex === 0 ? items.length - 1 : activeIndex - 1;
    setActiveIndex(nextIndex);
  };

  const goToIndex = (newIndex) => {
    if (animating) return;
    setActiveIndex(newIndex);
  };

  const slides = items.map((item) => {
    return (
      <CarouselItem
        className="custom_tag"
        key={item.id}
        onExiting={() => setAnimating(true)}
        onExited={() => setAnimating(false)}
      >
        <h3 className='tag_name'>{item.altText}</h3>
        <p className='text_size'>{item.caption}</p>
      </CarouselItem>
    );
  });

  return (
    <div>
      
      <Carousel activeIndex={activeIndex} next={next} previous={previous}>
        <CarouselIndicators
          items={items}
          activeIndex={activeIndex}
          onClickHandler={goToIndex}
        />
        {slides}
        <CarouselControl
          direction="prev"
          directionText="Previous"
          onClickHandler={previous}
        />
        <CarouselControl
          direction="next"
          directionText="Next"
          onClickHandler={next}
        />
      </Carousel>
    </div>
  );
}

export default InitialInstructions;