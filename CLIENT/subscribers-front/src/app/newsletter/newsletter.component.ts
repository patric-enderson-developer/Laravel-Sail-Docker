import { Component, OnInit, inject } from '@angular/core';
import { Contact, ContactService } from '../services/contact.service';
import { ContactModalComponent } from '../contact-modal/contact-modal.component';

@Component({
  selector: 'app-newsletter',
  standalone: true,
  imports: [ContactModalComponent],
  templateUrl: './newsletter.component.html',
  styleUrl: './newsletter.component.css'
})
export class NewsletterComponent implements OnInit {

  private contactService = inject(ContactService);

  contacts: Contact[] = [];

  isModalOpen = false;

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

  openModal(): void {
    console.log('ABRIU MODAL');
    this.isModalOpen = true;
  }

  closeModal(): void {
    this.isModalOpen = false;
  }
}
