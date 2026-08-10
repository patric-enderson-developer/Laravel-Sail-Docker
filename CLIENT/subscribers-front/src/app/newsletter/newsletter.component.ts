import { Component, OnInit, inject } from '@angular/core';
import { Contact, ContactService } from '../services/contact.service';

@Component({
  selector: 'app-newsletter',
  standalone: true,
  imports: [],
  templateUrl: './newsletter.component.html',
  styleUrl: './newsletter.component.css'
})
export class NewsletterComponent implements OnInit {

  private contactService = inject(ContactService);

  contacts: Contact[] = [];

  ngOnInit(): void {
    this.contactService.getContacts().subscribe({
      next: (data) => {
        this.contacts = data;
      },
      error: (error) => {
        console.error('Erro ao buscar inscritos:', error);
      }
    });
  }
}
