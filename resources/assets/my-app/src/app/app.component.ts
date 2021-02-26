import { Component } from '@angular/core';
import { Post } from './post';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'my-app';
  public posts: Post[] = [
    new Post("Wesley", "Meu post", "Coisa de loco bixo", "wdias9122@gmail.com", "Esse dia foi épico"),
    new Post("Maria", "Meu post 2", "Oloquinho meu", "maria@gmail.com", "Esse dia foi loco"),
    new Post("Ricardo", "Meu post 3", "Coisa de loco bixo", "ricardo@gmail.com", "Esse dia foi xato")
  ]
}
