import React, { useState } from 'react';
import {
  Carousel,
  CarouselItem,
  CarouselControl,
  CarouselIndicators,
  Button, 
  Modal, 
  ModalHeader, 
  ModalBody, 
  ModalFooter
} from 'reactstrap';

const items = [
  {
    id: 1,
    altText: 'Estamos para ayudarte.',
    caption: 'Si te llegas a perder, puedes perdirle ayuda a cualquiera que tenga el uniforme del Papalote.',
    modal: false,
    image:"/images/PAPALOTE.png"
  },
  {
    id: 2,
    altText: '¡Completa el recorrido!',
    caption: '¡Si visitas todos los puntos que hemos marcado, podras ganar geniales premios al final del recorrido!',
    modal: true,
    image:"/images/PAPALOTE.png"
  },
  {
    id: 3,
    altText: '¡Comenzamos!',
    caption: 'Por favor, dirigete al primer sitio que marca tu libro de retos.',
    modal: false,
    image:"/images/minecraft.gif"
  },
];


// auciliary prop
function PapaloteMap(props) {
  const [modal, setModal] = useState(false);

  const toggle = () => setModal(!modal);

  return (
    <div>
      <Button color="danger" size='sm' onClick={toggle}>
        Ver Mapa de Actividades
      </Button>
      <Modal isOpen={modal} toggle={toggle}>
        <ModalHeader toggle={toggle}>Mapa de Actividades</ModalHeader>
        <ModalBody>
          <img src='images/mapa-papalote.png' alt = "mapa"style={{width:300}}/>
        </ModalBody>
        <ModalFooter>
          <Button color="secondary" size='sm' onClick={toggle}>
            Regresar
          </Button>
        </ModalFooter>
      </Modal>
    </div>
  );
}

// main component
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
    if(item.modal){
      return (
        <CarouselItem
          className="custom_tag"
          key={item.id}
          onExiting={() => setAnimating(true)}
          onExited={() => setAnimating(false)}
        >
          <h3 className='tag_text title_size'>{item.altText}</h3>
          <p className='tag_text text_size'>{item.caption}</p>
          <PapaloteMap/>
        </CarouselItem>
      );
    }else{
      return (
        <CarouselItem
          className="custom_tag"
          key={item.id}
          onExiting={() => setAnimating(true)}
          onExited={() => setAnimating(false)}
        >
          <h3 className='tag_text title_size'>{item.altText}</h3>
          <p className='tag_text text_size'>{item.caption}</p>
          <img alt = "carousel" src = {item.image} style={{width:100}}/>
        </CarouselItem>
      );   
    }

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